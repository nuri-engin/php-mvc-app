Create and use the FIELDS name constants on here!

ie: 

```
// #01: Declare the constants;
$FIELDS = {
    title: "title",
    description: "description",
    image: "description",
    price: "description"
}

return FIELDS;

---

// #02: Use the constants in the app;
$FIELDS = require_once "/constants/FIELDS";

$this->pdo->prepare("INSERT INTO products ($FIELDS->title, FIELDS->description, ...)
```