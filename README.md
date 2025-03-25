# gateway-whatsapp
SMS Gateway для сервиса [whatsapp.com](https://www.whatsapp.com)

Установка:
```
composer require nekkoy/gateway-whatsapp
```

Конфигурация `.env`
===============
```
# Включить/выключить модуль
WHATSAPP_ENABLED=true

# API URL
WHATSAPP_API_URL=https://graph.facebook.com/v21.0/%s/messages

# Ключь API
WHATSAPP_API_KEY=

# ID подтвержденного номера
WHATSAPP_PHONE_ID=
```

Использование
===============

Создайте DTO сообщения, передав первым параметром текст, а вторым — номер получателя:
```
$message = new \Nekkoy\GatewayAbstract\DTO\MessageDTO("test", "+380123456789");
```

Затем вызовите метод отправки сообщения через фасад:
```
/** @var \Nekkoy\GatewayAbstract\DTO\ResponseDTO $response */
$response = \Nekkoy\GatewayWhatsapp\Facades\GatewayWhatsapp::send($message);
```

Метод возвращает DTO-ответ с параметрами:
 - message - сообщение об успешной отправке или ошибке
 - code - код ответа:
   - code < 0 - ошибка модуля
   - code > 0 - ошибка HTTP
   - code = 0 - успех
 - id - ID сообщения
