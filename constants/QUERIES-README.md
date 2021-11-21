Create and use the QUERIES constants here!

ie: 

```
// #01: Declare the constants;
QUERIES: {
    get: "SELECT * FROM products WHERE title LIKE :title ORDER BY create_date DESC",
    insert: "INSERT INTO products(title, image, description, price, create_date)VALUES:(:title, :image, :description, :price,:date)",
    update: "UPDATE products SET title =:title, image = :image, description = :description, price = :price WHERE id = :id",
    delete: "DELETE FROM products WHERE id = :id"
}

return QUERIES;

---

// #02: Use the constants in the app;
$QUERIES = require_once "/constants/QUERIES";

$this->pdo->prepare(QUERIES->get);
$this->pdo->prepare(QUERIES->insert);
$this->pdo->prepare(QUERIES->update);
$this->pdo->prepare(QUERIES->delete);
```