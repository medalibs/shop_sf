<h1> Shop (sf6, php8, DDD) </h1>

# Installation 

Clone the project : 

```
git clone git@github.com:medalibs/shop_sf_ddd.git
cd shop_sf_ddd/
```
Install dependencies :

```
php composer.phar install
```
Up the PostgreSQL database and execute a migration :
```
docker-compose up -d
bin/console doctrine:migrations:migrate
```

Start the symfony server  and go to nelmio api interface http://127.0.0.1:8000/api/doc
```
symfony server:start
```

Execute phpunit test-coverage
```
vendor/bin/phpunit --coverage-html public/test-coverage
OR
XDEBUG_MODE=coverage vendor/bin/phpunit --coverage-html public/test-coverage
```

# Project architecture 
````
src
├── Application
│   ├── Command
│   ├── Common
│   └── Service
├── Domain
│   ├── Entity
│   └── Repository
├── Infrastructure
│   ├── Common
│   ├── DQL
│   ├── ParamConverter
│   ├── Repository
│   └── Resources
├── Kernel.php
└── UI
    └── Rest


````

# Project architecture and classes
```
src
├── Application
│   ├── Command
│   │   ├── Product
│   │   │   ├── CreateProductCommandHandler.php
│   │   │   ├── ListProductCommandHandler.php
│   │   │   └── Request
│   │   │       ├── CreateProduct.php
│   │   │       └── FindProduct.php
│   │   ├── Stock
│   │   │   ├── CreateStockCommandHandler.php
│   │   │   └── Request
│   │   │       └── CreateStock.php
│   │   ├── Store
│   │   │   ├── CreateStoreCommandHandler.php
│   │   │   ├── FindStoreCommandHandler.php
│   │   │   └── Request
│   │   │       ├── CreateStore.php
│   │   │       └── FindStore.php
│   │   └── StoreManager
│   │       ├── CreateStoreManagerCommandHandler.php
│   │       └── Request
│   │           └── CreateStoreManager.php
│   ├── Common
│   │   └── Request
│   │       └── Pagination.php
│   └── Service
│       ├── Product
│       │   ├── CreateProductFactory.php
│       │   └── CreateProductHandler.php
│       ├── Store
│       │   ├── CreateStoreFactory.php
│       │   └── CreateStoreHandler.php
│       ├── StoreManager
│       │   ├── CreateStoreManagerFactory.php
│       │   └── CreateStoreManagerHandler.php
│       └── StoreProductStock
│           ├── CreateStockFactory.php
│           └── CreateStockHandler.php
├── Domain
│   ├── Entity
│   │   ├── Product.php
│   │   ├── StoreManager.php
│   │   ├── Store.php
│   │   └── StoreProductStock.php
│   └── Repository
│       ├── ProductRepositoryInterface.php
│       ├── StoreManagerRepositoryInterface.php
│       ├── StoreProductStockRepositoryInterface.php
│       └── StoreRepositoryInterface.php
├── Infrastructure
│   ├── Common
│   │   └── Pagination
│   │       └── Paginator.php
│   ├── DQL
│   │   └── Geolocation.php
│   ├── ParamConverter
│   │   ├── CreateProductConverter.php
│   │   ├── CreateStoreConverter.php
│   │   ├── CreateStoreManagerConverter.php
│   │   ├── ProductConverter.php
│   │   ├── SetStockConverter.php
│   │   └── StoreConverter.php
│   ├── Repository
│   │   ├── ProductRepository.php
│   │   ├── StoreManagerRepository.php
│   │   ├── StoreProductStockRepository.php
│   │   └── StoreRepository.php
│   └── Resources
│       └── Doctrine
│           ├── Product.orm.yml
│           ├── StoreManager.orm.yml
│           ├── Store.orm.yml
│           └── StoreProductStock.orm.yml
├── Kernel.php
└── UI
    └── Rest
        ├── Controller
        │   ├── Product
        │   │   ├── CreateProductAction.php
        │   │   └── ListProductAction.php
        │   ├── Store
        │   │   ├── CreateStoreAction.php
        │   │   └── SearchStoreAction.php
        │   ├── StoreManager
        │   │   └── CreateStoreManagerAction.php
        │   └── StoreProductStock
        │       └── SetStoreProductStock.php
        └── DTO
            ├── CreateProductDTO.php
            ├── CreateStoreDTO.php
            └── CreateStoreManagerDTO.php

``



