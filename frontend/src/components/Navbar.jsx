import { Link } from "react-router-dom";
import "./Navbar.css";

export default function Navbar() {
  return (
    <nav className="navbar">
      <div className="navbar-content">
        <h1 className="logo">Artemares</h1>
        <ul className="nav-links">
          <li><Link to="/">Inicio</Link></li>
          <li><Link to="/productos">Productos</Link></li>
          <li><Link to="/recetas">Recetas</Link></li>
        </ul>
      </div>
    </nav>
  );
}

