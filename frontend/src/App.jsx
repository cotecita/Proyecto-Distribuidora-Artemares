import { BrowserRouter as Router, Routes, Route, useLocation } from "react-router-dom";
import Navbar from "./components/Navbar";
import Footer from "./components/Footer";
import Home from "./pages/Home";
import Products from "./pages/Products";
import Recipes from "./pages/Recipes";

function AppContent() {
  const location = useLocation();
  const hideFooter = location.pathname === "/"; // ⬅️ OCULTA FOOTER SOLO EN HOME

  return (
    <div className="app-container">
      <Navbar />

      <main className="main-content">
        <Routes>
          <Route path="/" element={<Home />} />
          <Route path="/productos" element={<Products />} />
          <Route path="/recetas" element={<Recipes />} />
        </Routes>
      </main>

      {!hideFooter && <Footer />} {/* Footer solo si NO estamos en Home */}
    </div>
  );
}

export default function App() {
  return (
    <Router>
      <AppContent />
    </Router>
  );
}
