# API de Operações Bancárias (*em progresso*)

Esta API RESTful simula operações bancárias para diferentes moedas, permitindo saques, depósitos e consultas de saldo.

## Índice

- [Introdução](#introdução)
- [Recursos](#recursos)
- [Instalação](#instalação)
- [Uso](#uso)
- [Exemplos de Requisições](#exemplos-de-requisições)
- [Estrutura de Respostas](#estrutura-de-respostas)

## Introdução

Esta API foi desenvolvida para simular operações bancárias com suporte para múltiplas moedas, utilizando taxas de câmbio fornecidas pela API do Banco Central.

## Recursos

A API fornece os seguintes endpoints para operações bancárias:

### Criar conta

- `POST /account-create`
  - Parâmetros:
    - `client`: Nome do cliente

### Depósito

- `POST /deposit`
  - Parâmetros:
    - `accountId`: Número da conta
    - `value`: Valor a ser depositado
    - `currency`: Moeda do valor a ser depositado


### Saque

- `POST /withdraw`
  - Parâmetros:
    - `accountId`: Número da conta
    - `value`: Valor a ser sacado
    - `currency`: Moeda do valor a ser sacado


### Saldo

- `GET /balance`
  - Parâmetros:
    - `accountId`: Número da conta
    - `currency` (opcional): Moeda para o saldo
