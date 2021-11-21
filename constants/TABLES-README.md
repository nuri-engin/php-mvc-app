Create and use the TABLE name constants on here!

ie: 

```
// #01: Declare the constants;
$TABLES = {
    product: "product"
}

return TABLES;

---

// #02: Use the constants in the app;
$TABLES = require_once "/constants/TABLES";

$this->pdo->prepare("INSERT INTO TABLES->product ($FIELDS->title, FIELDS->description, ...)
```