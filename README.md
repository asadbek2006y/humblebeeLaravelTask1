# Tenant Management API

Bu loyiha tenant ma'lumotlarini saqlash va olish uchun RESTful API yaratishni ko'rsatadi. API orqali tenants (ijarachi) haqida ma'lumotlarni olish, yaratish va yangilash mumkin.

## O'rnatish

1. **Loyihani klonlash**:
    ```bash
    git clone https://github.com/your-username/project-name.git
    cd project-name
    ```

2. **Laravelni o'rnatish**:
    Laravelni o'rnatish uchun Composerni ishlating:
    ```bash
    composer install
    ```

3. **Muhitni sozlash**:
    `.env` faylini nusxalash:
    ```bash
    cp .env.example .env
    ```

4. **Agar PostgreSQL ma'lumotlar bazasi ishlatayotgan bo'lsangiz, .env faylida quyidagi sozlamalarni o'zgartiring**:
    ```env
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

5. **Migrationsni ishga tushirish**:
    Ma'lumotlar bazasini yaratish uchun quyidagi buyruqni ishga tushiring:
    ```bash
    php artisan migrate
    ```

6. **Fake ma'lumotlar yaratish (optional)**:
    Agar test uchun ma'lumotlar kerak bo'lsa, quyidagi buyruqni ishlatib, fake ma'lumotlar yaratishingiz mumkin:
    ```bash
    php artisan db:seed
    ```

## API Endpoints

### 1. **GET /api/tenants/{id}**
Tenant haqida ma'lumotlarni olish uchun endpoint.

#### So'rov:
```http
GET /api/tenants/1
````

#### Javob:

```json
{
    "id": 1,
    "name": "Tenant Name",
    "domain": "tenant.domain.com",
    "config_json": {
        "enable_feature_x": true,
        "theme": "dark"
    },
    "created_at": "2025-05-02T09:38:33.000000Z",
    "updated_at": "2025-05-02T09:38:33.000000Z"
}
```


#### Javob:

```json
{
    "enable_feature_x": true,
    "theme": "dark"
}
```

#### Ma'lumotlar (JSON):

```json
{
    "name": "Updated Tenant",
    "domain": "updatedtenant.domain.com",
    "config_json": {
        "enable_feature_x": false,
        "theme": "light"
    }
}
```

#### Javob:

```json
{
    "id": 1,
    "name": "Updated Tenant",
    "domain": "updatedtenant.domain.com",
    "config_json": {
        "enable_feature_x": false,
        "theme": "light"
    },
    "created_at": "2025-05-02T09:38:33.000000Z",
    "updated_at": "2025-05-02T09:42:12.000000Z"
}
```

## Testlar

Testlar `PHPUnit` yordamida ishlaydi. Testlarni quyidagi buyruq yordamida ishga tushurishingiz mumkin:

```bash
php artisan test
```

Testlar quyidagilarni o'z ichiga oladi:

* Tenantni olish.
* Yangi tenant yaratish.
* Mavjud bo'lmagan tenantga murojaat qilishda 404 xatosi.

## Qo'llanma

1. **Faker ma'lumotlarini yaratish**:
   `TenantFactory` yordamida test yoki seed uchun ma'lumotlarni yaratishingiz mumkin.

2. **Testing**:
   Testlar `TenantControllerTest` faylida mavjud bo'lib, barcha kerakli endpointlarni tekshiradi.

3. **API Response Strukturasi**:
   Barcha endpointlar quyidagi JSON formatida javob beradi:

   * `config_json` maydoni obyekt sifatida, string emas.

## Loyiha tuzilmasi

```
- app/
  - Models/
    - Tenant.php
  - Http/
    - Controllers/
      - TenantController.php
- database/
  - factories/
    - TenantFactory.php
  - migrations/
    - xxxx_xx_xx_create_tenants_table.php
- routes/
  - api.php
- tests/
  - Feature/
    - TenantControllerTest.php
  - Unit/
    - ExampleTest.php
- .env
- composer.json
- README.md
```

---

Ushbu loyiha sizga tenantni yaratish, olish va yangilash bo'yicha API yaratish bilan birga Laravelda RESTful API dizayniga kirish imkonini beradi.

```

Bu `README.md` fayli API'ni qanday ishlatish, sozlash va test qilish haqida to'liq tushuntirishni o'z ichiga oladi.
```
