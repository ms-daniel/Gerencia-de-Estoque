-- tabela de usuários
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    first_name VARCHAR(80) NOT NULL,
	last_name VARCHAR(80) NOT NULL,
    email VARCHAR(200) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- tabela de lojas/estabelecimentos
CREATE TABLE store (
    id SERIAL PRIMARY KEY,
    name VARCHAR(250) NOT NULL,
    street VARCHAR(250) NOT NULL,
    city VARCHAR(150) NOT NULL,
    state VARCHAR(100) NOT NULL,
    country VARCHAR(100) NOT NULL,
    postal_code VARCHAR(20),
    user_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- tabela de fornecedores
CREATE TABLE supplier (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    email VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- tabela de itens/produtos
CREATE TABLE item (
    id SERIAL PRIMARY KEY,
	code VARCHAR(100),
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    supplier_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (supplier_id) REFERENCES supplier(id) ON DELETE SET NULL
);

-- tabela de estoque
CREATE TABLE stock (
    id SERIAL PRIMARY KEY,
    item_id INT NOT NULL,
    store_id INT NOT NULL,
    quantity INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (item_id) REFERENCES item(id) ON DELETE CASCADE,
    FOREIGN KEY (store_id) REFERENCES store(id) ON DELETE CASCADE
);

-- tabela de entradas/saídas de itens
CREATE TABLE stock_movements (
    id SERIAL PRIMARY KEY,
    item_id INT NOT NULL,
    store_id INT NOT NULL,
    movement_type VARCHAR(10) NOT NULL CHECK (movement_type IN ('entrada', 'saida')),
    quantity INT NOT NULL,
    movement_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (item_id) REFERENCES item(id) ON DELETE CASCADE,
    FOREIGN KEY (store_id) REFERENCES store(id) ON DELETE CASCADE
);

-- Índicess para melhorar o desempenho
CREATE INDEX idx_user_email ON users(email);
CREATE INDEX idx_item_supplier ON item(supplier_id);
CREATE INDEX idx_stock_item_store ON stock(item_id, store_id);
CREATE INDEX idx_stock_movements_item_store ON stock_movements(item_id, store_id);
