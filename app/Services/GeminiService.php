<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

/**
 * Serviço para interação com a API Gemini da Google
 * 
 * Esta classe gerencia todas as comunicações com a API Gemini,
 * incluindo o envio de prompts e processamento de respostas.
 */
class GeminiService
{
    /**
     * Chave de API para autenticação com o serviço Gemini
     * @var string
     */
    protected $apiKey;
    
    /**
     * URL do endpoint da API Gemini
     * @var string
     */
    protected $endpoint;
    
    /**
     * Prompt de sistema que define o comportamento da IA
     * @var string
     */
    protected $systemPrompt;
    
    /**
     * Valor de temperatura que controla a aleatoriedade das respostas
     * @var float
     */
    protected $temperature;

    /**
     * Inicializa o serviço com configurações do arquivo config/services.php
     */
    public function __construct()
    {
        $this->apiKey = config('services.gemini.api_key');
        $this->endpoint = config('services.gemini.url');
        $this->temperature = 0.7; // Valor padrão para equilíbrio entre criatividade e precisão. Uma configguração mais proxima de 0 gera respostas mais diretas, enquanto valores próximos de 1 aumentam a criativdade e chance de alucinar.
        
        // Define a personalidade e comportamento do assistente
        $this->systemPrompt = "Você é um assistente de estudos voltado para alunos da área de tecnologia, com foco em:
            - Programação
            - Banco de Dados
            - Redes de Computadores
            - Engenharia de Software
            - Desenvolvimento Web

            Seu papel é gerar conteúdos educativos e técnicos de forma clara, organizada e didática.  
            Siga sempre o formato abaixo nas respostas:

            1. **Explicação resumida (até 5 linhas)**  
            Apresente uma explicação direta e fácil de entender sobre o tema solicitado.

            2. **Questões de estudo (3 a 5 perguntas)**  
            Crie perguntas mistas — algumas de múltipla escolha, outras dissertativas — que ajudem o estudante a refletir e fixar o conteúdo.

            3. **Exemplo prático (quando aplicável)**  
            Mostre uma aplicação prática ou um trecho de código simples que demonstre o conceito em uso.

            4. **Dica de estudo**  
            Dê uma dica rápida para memorizar, revisar ou relacionar o tema a situações reais da área de TI.

            O tom das respostas deve ser educacional, motivador e técnico, como o de um tutor universitário que ajuda alunos a entenderem os fundamentos da computação.";
        }

    /**
     * Envia uma pergunta para a API Gemini e retorna a resposta
     * 
     * @param string $prompt A pergunta ou instrução do usuário
     * @return string A resposta gerada pela IA ou mensagem de erro
     */
    public function ask(string $prompt)
    {
        // Faz a requisição para a API Gemini
        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post($this->endpoint . "?key=" . $this->apiKey, [
            "contents" => [
                [
                    "parts" => [
                        // Primeiro enviamos o contexto do agente
                        ["text" => $this->systemPrompt],
                        // Depois a pergunta do usuário
                        ["text" => $prompt]
                    ]
                ]
            ],
            "generationConfig" => [
                "temperature" => $this->temperature
            ]
        ]);

        // Verifica se a requisição foi bem-sucedida
        if ($response->successful()) {
            return $response->json('candidates.0.content.parts.0.text');
        }

        // Retorna mensagem de erro em caso de falha
        return "Erro: " . $response->body();
    }

    /**
     * Lista todos os modelos disponíveis na API Gemini
     * 
     * @return array Informações sobre os modelos disponíveis
     */
    public function listarModelos()
    {
        $response = Http::get("https://generativelanguage.googleapis.com/v1/models?key=" . $this->apiKey);
        return $response->json();
    }
}