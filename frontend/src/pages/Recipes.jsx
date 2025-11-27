import { useState, useMemo } from "react";
import { motion, AnimatePresence } from "framer-motion";
import "./Recipes.css";

/* ========================================================================= */
/* ======================  RECETAS HARDCODEADAS ============================ */
/* ========================================================================= */

const RECIPES = [
  {
    id: 1,
    name: "Salmón a la mantequilla",
    description: "Receta rápida y llena de sabor para realzar el salmón fresco.",
    preparation:
      "Derrite mantequilla en una sartén caliente, agrega ajo picado, sal y pimienta. Sella el salmón por 3–4 minutos por lado. Finaliza con jugo de limón y perejil.",
    images: {
      small: "/images/recipes/salmon-small.jpg",
      medium: "/images/recipes/salmon-medium.jpg",
    },
    ingredients: [1, 4], 
  },
  {
    id: 2,
    name: "Camarones al pil pil",
    description: "Clásico chileno ideal para picoteos o entradas calientes.",
    preparation:
      "En aceite caliente agrega ajo laminado y ají. Incorpora los camarones y cocina 2–3 minutos. Finaliza con perejil y sal.",
    images: {
      small: "/images/recipes/camaron-small.jpg",
      medium: "/images/recipes/camaron-medium.jpg",
    },
    ingredients: [2],
  },
  {
    id: 3,
    name: "Cazuela marina",
    description: "Preparación tradicional con pescado blanco y mariscos.",
    preparation:
      "Hierve papas, zanahoria y zapallo. Agrega merluza y mariscos. Sazona con cilantro, orégano y comino. Cocina a fuego lento por 10 minutos.",
    images: {
      small: "/images/recipes/cazuela-small.jpg",
      medium: "/images/recipes/cazuela-medium.jpg",
    },
    ingredients: [3, 4],
  },
];

/* ========================================================================= */
/* ============================  COMPONENTE  ================================ */
/* ========================================================================= */

export default function Recipes({ products = [], openProductModal }) {
  const [search, setSearch] = useState("");
  const [filter, setFilter] = useState("Todos");
  const [selectedRecipe, setSelectedRecipe] = useState(null);

  const normalize = (t) =>
    t.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase();

  /* ================= FILTRADO ================= */

  const filteredRecipes = useMemo(() => {
    const s = normalize(search);

    return RECIPES.filter((r) => {
      const matchesSearch = normalize(r.name).includes(s);
      const matchesFilter =
        filter === "Todos" || r.ingredients.includes(Number(filter));

      return matchesSearch && matchesFilter;
    });
  }, [search, filter]);

  /* ========================================================================= */
  /* ============================  RENDER  =================================== */
  /* ========================================================================= */

  return (
    <div className="recipes-page">

      {/* ========================== HEADER ========================== */}

      <div className="recipes-header">
        <h1>Recetas Artemares</h1>
        <p className="subtitle">
          Aprende a preparar platos deliciosos usando nuestros productos del mar.
        </p>

        <div className="recipes-filters">
          <input
            type="text"
            placeholder="Buscar receta..."
            value={search}
            onChange={(e) => setSearch(e.target.value)}
          />

          <select value={filter} onChange={(e) => setFilter(e.target.value)}>
            <option value="Todos">Todos los ingredientes</option>

            {products.map((p) => (
              <option key={p.id} value={p.id}>
                {p.name}
              </option>
            ))}
          </select>
        </div>
      </div>

      {/* ========================== GRID ============================= */}

      <div className="recipes-grid">
        {filteredRecipes.map((r) => (
          <motion.div
            key={r.id}
            className="recipe-card"
            whileHover={{ y: -4, scale: 1.01 }}
            transition={{ duration: 0.2 }}
            onClick={() => setSelectedRecipe(r)}
          >
            <img src={r.images.small} alt={r.name} />

            <div className="recipe-body">
              <h3>{r.name}</h3>
              <p className="recipe-desc">{r.description}</p>
              <button className="recipe-btn">Ver receta</button>
            </div>
          </motion.div>
        ))}
      </div>

      {/* ========================== MODAL ============================ */}

      <AnimatePresence>
        {selectedRecipe && (
          <motion.div
            className="recipe-modal-overlay"
            initial={{ opacity: 0 }}
            animate={{ opacity: 1 }}
            exit={{ opacity: 0 }}
            onClick={() => setSelectedRecipe(null)}
          >
            <motion.div
              className="recipe-modal"
              initial={{ scale: 0.92, y: 20 }}
              animate={{ scale: 1, y: 0 }}
              exit={{ scale: 0.92, y: 20 }}
              transition={{ duration: 0.25 }}
              onClick={(e) => e.stopPropagation()}
            >
              {/* BOTÓN CERRAR */}
              <button
                className="recipe-close-btn"
                onClick={() => setSelectedRecipe(null)}
              >
                ✕
              </button>

              <div className="recipe-modal-layout">

                {/* IMAGEN */}
                <div className="recipe-modal-image">
                  <img
                    src={
                      selectedRecipe.images.medium ||
                      selectedRecipe.images.small
                    }
                    alt={selectedRecipe.name}
                  />
                </div>

                {/* CONTENIDO */}
                <div className="recipe-modal-info">
                  <h2>{selectedRecipe.name}</h2>
                  <p className="recipe-detail-desc">
                    {selectedRecipe.description}
                  </p>

                  {/* ========== INGREDIENTES ========== */}

                  <div className="recipe-ingredientes-block">
                    <h3>Ingredientes</h3>

                    <ul className="ingredients-list">
                      {selectedRecipe.ingredients.map((prodId) => {
                        const p = products.find((x) => x.id === prodId);

                        return (
                          <li key={prodId}>
                            <div className="ingredient-info">
                              <span className="ingredient-name">
                                {p?.name ?? "Producto no disponible"}
                              </span>

                              {p ? (
                                <span className="ingredient-tag available">
                                  ✔ Disponible
                                </span>
                              ) : (
                                <span className="ingredient-tag not-available">
                                  ✕ No disponible
                                </span>
                              )}
                            </div>

                            {p && (
                              <button
                                className="ingredient-btn"
                                onClick={() => {
                                  setSelectedRecipe(null);
                                  openProductModal(p);
                                }}
                              >
                                Ver producto
                              </button>
                            )}
                          </li>
                        );
                      })}
                    </ul>
                  </div>

                  {/* ========== PREPARACIÓN ========== */}

                  <div className="recipe-preparation-block">
                    <h3>Preparación</h3>
                    <p className="preparation-text">
                      {selectedRecipe.preparation}
                    </p>
                  </div>

                </div>
              </div>

            </motion.div>
          </motion.div>
        )}
      </AnimatePresence>
    </div>
  );
}
