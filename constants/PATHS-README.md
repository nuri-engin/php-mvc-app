Create and use the router path constants here!

ie: 

```
// #01: Declare the constants;
$PATHS = {};
$products = "products";

PATHS->PRODUCTS: {
    index: "$products/index",
    create: "$products/create",
    update: "$products/update"
}

return PATHS;

---

// #02: Use the constants in the app;
$PATHS = require_once "/constants/PATHS";

return $router->renderView($PATHS->PRODUCTS->index);
```