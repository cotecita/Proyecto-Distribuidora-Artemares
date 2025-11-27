import { useMemo, useState } from "react";
import "./Products.css";
import { motion, AnimatePresence } from "framer-motion";

/**
 * Catálogo base de productos.
 * En integración real esto debería venir desde una API o contexto global.
 * Ahora cada producto maneja 3 tamaños de imagen: small, medium, large.
 */
const PRODUCTS = [
  {
    id: 1,
    name: "Salmón Premium",
    category: "Pescados",
    price: 13990,
    unit: "kg",
    images: {
      small: "/images/salmon-small.jpg",
      medium: "/images/salmon-medium.jpg",
      large: "/images/products/salmon-large.jpg",
    },
    description:
      "Salmón fresco de alta calidad, ideal para sashimi, a la plancha o al horno. Trabajo directo con productores del sur.",
    nutrition: {
      calories: 208,
      protein: 20,
      carbs: 0,
      fat: 13,
      sodium: 59,
    },
    recipes: [
      { id: "r1", name: "Salmón a la mantequilla de hierbas" },
      { id: "r2", name: "Tártaro de salmón con palta" },
    ],
  },
  {
    id: 2,
    name: "Camarón Ecuatoriano",
    category: "Crustáceos",
    price: 9990,
    unit: "kg",
    images: {
      small: "/images/products/camaron-small.jpg",
      medium: "/images/products/camaron-medium.jpg",
      large: "/images/products/camaron-large.jpg",
    },
    description:
      "Camarón calibre 40/50, limpio y desvenado, perfecto para salteados, pastas y preparaciones al ajillo.",
    nutrition: {
      calories: 99,
      protein: 24,
      carbs: 0.2,
      fat: 0.3,
      sodium: 148,
    },
    recipes: [
      { id: "r3", name: "Camarones al pil pil" },
      { id: "r4", name: "Risotto de camarones" },
    ],
  },
  {
    id: 3,
    name: "Cholgas Congeladas",
    category: "Moluscos",
    price: 6990,
    unit: "kg",
    images: {
      small: "/images/products/cholgas-small.jpg",
      medium: "/images/products/cholgas-medium.jpg",
      large: "/images/products/cholgas-large.jpg",
    },
    description:
      "Cholgas limpias, desconchadas y congeladas, listas para chupe, mariscal o cazuelas marinas.",
    nutrition: {
      calories: 86,
      protein: 15,
      carbs: 3,
      fat: 1.4,
      sodium: 150,
    },
    recipes: [{ id: "r5", name: "Chupe de mariscos Artemares" }],
  },
  {
    id: 4,
    name: "Merluza Austral",
    category: "Pescados",
    price: 6490,
    unit: "kg",
    images: {
      small: "/images/products/merluza-small.jpg",
      medium: "/images/products/merluza-medium.jpg",
      large: "/images/products/merluza-large.jpg",
    },
    description:
      "Filetes de merluza austral sin espinas, ideal para frituras, al horno o preparaciones caseras.",
    nutrition: {
      calories: 90,
      protein: 18,
      carbs: 0,
      fat: 1.5,
      sodium: 80,
    },
    recipes: [
      { id: "r6", name: "Merluza frita con ensalada chilena" },
      { id: "r7", name: "Cazuela marina" },
    ],
  },
  {
    id: 5,
    name: "Pulpo Cocido",
    category: "Otros",
    price: 18990,
    unit: "kg",
    images: {
      small: "/images/products/pulpo-small.jpg",
      medium: "/images/products/pulpo-medium.jpg",
      large: "/images/products/pulpo-large.jpg",
    },
    description:
      "Pulpo cocido en su punto, fácil de porcionar y listo para plancha, carpaccios o ensaladas.",
    nutrition: {
      calories: 82,
      protein: 15,
      carbs: 2.2,
      fat: 1,
      sodium: 230,
    },
    recipes: [{ id: "r8", name: "Pulpo a la parrilla con papas" }],
  },
];

/**
 * Normaliza texto para búsquedas insensibles a mayúsculas y tildes.
 */
function normalizeText(text) {
  return text
    .normalize("NFD")
    .replace(/[\u0300-\u036f]/g, "")
    .toLowerCase();
}

export default function Products() {
  const [search, setSearch] = useState("");
  const [category, setCategory] = useState("Todos");
  const [selectedProduct, setSelectedProduct] = useState(null);
  const [quantities, setQuantities] = useState({});
  const [cart, setCart] = useState({}); // { productId: quantity }
  const [isCartOpen, setIsCartOpen] = useState(false);

  const handleChangeQuantity = (productId, delta) => {
    setQuantities((prev) => {
      const current = prev[productId] ?? 1;
      const updated = Math.max(1, current + delta);
      return { ...prev, [productId]: updated };
    });
  };

  const handleSetQuantity = (productId, value) => {
    const parsed = parseInt(value, 10);
    if (isNaN(parsed) || parsed <= 0) return;
    setQuantities((prev) => ({ ...prev, [productId]: parsed }));
  };

  const handleAddToCart = (productId, quantityOverride) => {
    setCart((prev) => {
      const current = prev[productId] ?? 0;
      const quantity =
        typeof quantityOverride === "number"
          ? quantityOverride
          : quantities[productId] ?? 1;
      return { ...prev, [productId]: current + quantity };
    });
  };

  const handleUpdateCartItem = (productId, delta) => {
    setCart((prev) => {
      const current = prev[productId] ?? 0;
      const updated = current + delta;

      // También mantener quantities alineado
      setQuantities((prevQ) => {
        if (updated <= 0) {
          const { [productId]: _, ...restQ } = prevQ;
          return restQ;
        }
        return { ...prevQ, [productId]: updated };
      });

      if (updated <= 0) {
        const { [productId]: _, ...rest } = prev;
        return rest;
      }
      return { ...prev, [productId]: updated };
    });
  };

  const handleRemoveFromCart = (productId) => {
    setCart((prev) => {
      const { [productId]: _, ...rest } = prev;
      return rest;
    });
  };

  const totalItemsInCart = useMemo(
    () => Object.values(cart).reduce((acc, n) => acc + n, 0),
    [cart]
  );

  const cartItems = useMemo(() => {
    return Object.entries(cart)
      .map(([id, quantity]) => {
        const product = PRODUCTS.find((p) => p.id === Number(id));
        if (!product) return null;
        return { product, quantity };
      })
      .filter(Boolean);
  }, [cart]);

  const cartTotal = useMemo(
    () =>
      cartItems.reduce(
        (acc, item) => acc + item.product.price * item.quantity,
        0
      ),
    [cartItems]
  );

  const filteredProducts = useMemo(() => {
    const normSearch = normalizeText(search);
    return PRODUCTS.filter((p) => {
      const matchesCategory = category === "Todos" || p.category === category;
      const matchesSearch = normalizeText(p.name).includes(normSearch);
      return matchesCategory && matchesSearch;
    });
  }, [search, category]);

  const handleCheckout = () => {
    // Aquí luego puedes integrar WhatsApp, formulario o backend.
    alert(
      "Gracias por tu compra. Pronto conectaremos este carrito con el sistema de pedidos de Artemares."
    );
  };

  return (
    <div className="products-page">
      <div className="products-header">
        <div className="products-header-main">
          <div>
            <h1>Nuestros productos del mar</h1>
            <p className="header-subtitle">
              Explora nuestro catálogo y agrega al carrito directamente desde el
              listado o desde el detalle de cada producto.
            </p>
          </div>

          <div
            className="cart-summary"
            role="button"
            onClick={() => setIsCartOpen(true)}
          >
            <span className="cart-label">Carrito</span>
            <span className="cart-pill">{totalItemsInCart} ítems</span>
          </div>
        </div>

        <div className="products-filters">
          <input
            type="text"
            className="search-input"
            placeholder="Buscar por nombre..."
            value={search}
            onChange={(e) => setSearch(e.target.value)}
          />

          <select
            className="filter-select"
            value={category}
            onChange={(e) => setCategory(e.target.value)}
          >
            <option value="Todos">Todas las categorías</option>
            <option value="Moluscos">Moluscos</option>
            <option value="Crustáceos">Crustáceos</option>
            <option value="Pescados">Pescados</option>
            <option value="Otros">Otras</option>
          </select>
        </div>
      </div>

      {/* GRID DE PRODUCTOS */}
      <div className="products-grid">
        {filteredProducts.map((product) => {
          const qty = quantities[product.id] ?? 1;
          const thumbSrc =
            product.images?.small ||
            product.images?.medium ||
            product.images?.large ||
            "";
          return (
            <motion.div
              key={product.id}
              className="product-card"
              whileHover={{ y: -4, scale: 1.01 }}
              transition={{ duration: 0.2 }}
              onClick={() => setSelectedProduct(product)}
            >
              <div className="product-thumb">
                <img src={thumbSrc} alt={product.name} />
              </div>

              <div className="product-body">
                <h3>{product.name}</h3>
                <p className="product-price">
                  ${product.price.toLocaleString("es-CL")}{" "}
                  <span className="unit">/ {product.unit}</span>
                </p>
                <span className={`tag tag--${product.category.toLowerCase()}`}>
                  {product.category}
                </span>
              </div>

              {/* Controles rápidos de carrito */}
              <div
                className="product-actions"
                onClick={(e) => e.stopPropagation()} // no abrir modal
              >
                <div className="qty-control">
                  <button onClick={() => handleChangeQuantity(product.id, -1)}>
                    -
                  </button>
                  <input
                    type="number"
                    min="1"
                    value={qty}
                    onChange={(e) =>
                      handleSetQuantity(product.id, e.target.value)
                    }
                  />
                  <button onClick={() => handleChangeQuantity(product.id, 1)}>
                    +
                  </button>
                </div>
                <button
                  className="add-cart-btn"
                  onClick={() => handleAddToCart(product.id)}
                >
                  Agregar al carrito
                </button>
              </div>
            </motion.div>
          );
        })}
      </div>

      {/* MODAL DETALLE DE PRODUCTO */}
      <AnimatePresence>
        {selectedProduct && (
          <motion.div
            className="product-modal"
            initial={{ opacity: 0 }}
            animate={{ opacity: 1 }}
            exit={{ opacity: 0 }}
          >
            <motion.div
              className="modal-content"
              initial={{ scale: 0.9, y: 20 }}
              animate={{ scale: 1, y: 0 }}
              exit={{ scale: 0.9, y: 20 }}
              transition={{ duration: 0.2 }}
            >
              <button
                className="close-btn"
                onClick={() => setSelectedProduct(null)}
              >
                ✕
              </button>

              <div className="modal-layout">
                <div className="modal-image">
                  <img
                    src={
                      selectedProduct.images?.medium ||
                      selectedProduct.images?.large ||
                      selectedProduct.images?.small
                    }
                    alt={selectedProduct.name}
                  />
                </div>

                <div className="modal-info">
                  <p className="section-kicker">{selectedProduct.category}</p>
                  <h2>{selectedProduct.name}</h2>

                  <p className="modal-price">
                    ${selectedProduct.price.toLocaleString("es-CL")}{" "}
                    <span>/ {selectedProduct.unit}</span>
                  </p>

                  <p className="modal-description">
                    {selectedProduct.description}
                  </p>

                  {/* Información nutricional */}
                  {selectedProduct.nutrition && (
                    <div className="nutrition-block">
                      <h3>Información nutricional (por 100 g)</h3>
                      <div className="nutrition-grid">
                        <div>
                          <span>Calorías</span>
                          <strong>
                            {selectedProduct.nutrition.calories} kcal
                          </strong>
                        </div>
                        <div>
                          <span>Proteínas</span>
                          <strong>
                            {selectedProduct.nutrition.protein} g
                          </strong>
                        </div>
                        <div>
                          <span>Carbohidratos</span>
                          <strong>
                            {selectedProduct.nutrition.carbs} g
                          </strong>
                        </div>
                        <div>
                          <span>Grasas totales</span>
                          <strong>{selectedProduct.nutrition.fat} g</strong>
                        </div>
                        <div>
                          <span>Sodio</span>
                          <strong>
                            {selectedProduct.nutrition.sodium} mg
                          </strong>
                        </div>
                      </div>
                    </div>
                  )}

                  {/* Selector de cantidad + agregar al carrito */}
                  <div className="modal-actions">
                    <div className="qty-control">
                      <button
                        onClick={() =>
                          handleChangeQuantity(selectedProduct.id, -1)
                        }
                      >
                        -
                      </button>
                      <input
                        type="number"
                        min="1"
                        value={quantities[selectedProduct.id] ?? 1}
                        onChange={(e) =>
                          handleSetQuantity(
                            selectedProduct.id,
                            e.target.value
                          )
                        }
                      />
                      <button
                        onClick={() =>
                          handleChangeQuantity(selectedProduct.id, 1)
                        }
                      >
                        +
                      </button>
                    </div>

                    <button
                      className="add-cart-btn primary"
                      onClick={() =>
                        handleAddToCart(
                          selectedProduct.id,
                          quantities[selectedProduct.id] ?? 1
                        )
                      }
                    >
                      Agregar al carrito
                    </button>
                  </div>

                  {/* Recetas asociadas */}
                  {selectedProduct.recipes?.length > 0 && (
                    <div className="recipes-block">
                      <h3>Recetas asociadas</h3>
                      <ul>
                        {selectedProduct.recipes.map((r) => (
                          <li key={r.id}>{r.name}</li>
                        ))}
                      </ul>
                    </div>
                  )}
                </div>
              </div>
            </motion.div>
          </motion.div>
        )}
      </AnimatePresence>

      {/* PANEL LATERAL DEL CARRITO */}
      <AnimatePresence>
        {isCartOpen && (
          <motion.div
            className="cart-overlay"
            initial={{ opacity: 0 }}
            animate={{ opacity: 1 }}
            exit={{ opacity: 0 }}
            onClick={() => setIsCartOpen(false)}
          >
            <motion.div
              className="cart-panel"
              initial={{ x: "100%" }}
              animate={{ x: 0 }}
              exit={{ x: "100%" }}
              transition={{ type: "tween", duration: 0.25 }}
              onClick={(e) => e.stopPropagation()}
            >
              <div className="cart-panel-header">
                <h2>Tu carrito</h2>
                <button
                  className="close-btn close-btn--cart"
                  onClick={() => setIsCartOpen(false)}
                >
                  ✕
                </button>
              </div>

              <div className="cart-panel-body">
                {cartItems.length === 0 ? (
                  <p className="cart-empty">
                    Aún no has agregado productos. Explora el catálogo y agrega
                    lo que necesites.
                  </p>
                ) : (
                  <ul className="cart-items-list">
                    {cartItems.map(({ product, quantity }) => {
                      const thumb =
                        product.images?.small ||
                        product.images?.medium ||
                        product.images?.large ||
                        "";
                      return (
                        <li key={product.id} className="cart-item">
                          <div className="cart-item-image">
                            <img src={thumb} alt={product.name} />
                          </div>
                          <div className="cart-item-info">
                            <div className="cart-item-header">
                              <span className="cart-item-name">
                                {product.name}
                              </span>
                              <button
                                className="cart-item-remove"
                                onClick={() => handleRemoveFromCart(product.id)}
                              >
                                Eliminar
                              </button>
                            </div>
                            <div className="cart-item-meta">
                              <span className="cart-item-price">
                                ${product.price.toLocaleString("es-CL")} /{" "}
                                {product.unit}
                              </span>
                            </div>
                            <div className="cart-item-actions">
                              <div className="qty-control qty-control--small">
                                <button
                                  onClick={() =>
                                    handleUpdateCartItem(product.id, -1)
                                  }
                                >
                                  -
                                </button>
                                <span className="cart-item-qty">
                                  {quantity}
                                </span>
                                <button
                                  onClick={() =>
                                    handleUpdateCartItem(product.id, 1)
                                  }
                                >
                                  +
                                </button>
                              </div>
                              <span className="cart-item-subtotal">
                                $
                                {(
                                  product.price * quantity
                                ).toLocaleString("es-CL")}
                              </span>
                            </div>
                          </div>
                        </li>
                      );
                    })}
                  </ul>
                )}
              </div>

              <div className="cart-panel-footer">
                <div className="cart-total-row">
                  <span>Total</span>
                  <strong>${cartTotal.toLocaleString("es-CL")}</strong>
                </div>

                <button
                  className="cart-checkout-btn"
                  disabled={cartItems.length === 0}
                  onClick={handleCheckout}
                >
                  Confirmar pedido
                </button>
              </div>
            </motion.div>
          </motion.div>
        )}
      </AnimatePresence>
    </div>
  );
}
