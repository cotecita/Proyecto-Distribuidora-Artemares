import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import Navbar from "./components/Navbar";
import Footer from "./components/Footer"
import Home from "./pages/Home";
import Products from "./pages/Products";
import Recipes from "./pages/Recipes";

export default function App() {
  return (
    <Router>
      <div className="app-container">
        <Navbar />
        <main className="main-content">
          <Routes>
            <Route path="/" element={<Home />} />
            <Route path="/productos" element={<Products />} />
            <Route path="/recetas" element={<Recipes />} />
          </Routes>
        </main>
        <Footer />
      </div>
    </Router>
  );
}


