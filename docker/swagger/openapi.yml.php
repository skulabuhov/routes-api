openapi: 3.0.0
info:
  title: API Маршрутов
  version: 1.0.0
servers:
  - url: //<?=getenv('DOCKER_SWAGGER_SERVER')?>

tags:
  - name: Основные запросы
paths:
  /v1/geocoder:
    get:
      tags:
        - Основные запросы
      summary: Получить геоданные по запросу
      parameters:
        - name: query
          in: query
          required: true
          schema:
            type: string
      responses:
        '200':
          description: Успешный ответ
          content:
            application/json:
              schema:
                type: object
                properties:
                  success:
                    type: boolean
                  data:
                    type: object
                    properties:
                      points:
                        type: array
                        items:
                          $ref: '#/components/schemas/GeocoderPoint'
        '400':
          description: Ошибка запроса
          content:
            application/json:
              schema:
                $ref: '#/components/schemas/ErrorResponse'
  /v1/route/create:
    post:
      tags:
        - Основные запросы
      summary: Создать маршрут
      requestBody:
        required: true
        content:
          application/json:
            schema:
              type: object
              properties:
                waypoints:
                  type: array
                  items:
                    type: array
                    items:
                      type: number
                  minItems: 2
                parameters:
                  type: object
                  additionalProperties:
                    type: string
      responses:
        '200':
          description: Успешное создание маршрута
          content:
            application/json:
              schema:
                type: object
                properties:
                  success:
                    type: boolean
                  data:
                    type: object
                    properties:
                      route:
                        $ref: '#/components/schemas/Route'
        '400':
          description: Ошибка запроса
          content:
            application/json:
              schema:
                $ref: '#/components/schemas/ErrorResponse'
components:
  schemas:
    GeocoderPoint:
      type: object
      properties:
        address:
          type: string
        latitude:
          type: number
        longitude:
          type: number
        fias_id:
          type: string
    Route:
      type: object
      properties:
        timestamp:
          type: integer
        legs:
          type: array
          items:
            type: object
            properties:
              departure:
                type: array
                items:
                  type: number
              destination:
                type: array
                items:
                  type: number
              distance:
                type: integer
        full:
          type: object
          properties:
            departure:
              type: array
              items:
                type: number
            destination:
              type: array
              items:
                type: number
            distance:
              type: integer
        details:
          type: array
          items:
            type: array
            items:
              type: number
    ErrorResponse:
      type: object
      properties:
        success:
          type: boolean
        data:
          type: object
          properties:
            message:
              type: string
  securitySchemes:
    ApiKeyAuth:
      type: apiKey
      in: header
      name: X-Api-Key
security:
  - ApiKeyAuth: []
