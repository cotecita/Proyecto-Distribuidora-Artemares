import { Link } from "react-router-dom";
import "./Navbar.css";

export default function Navbar() {
  return (
    <nav className="navbar">
      <div className="navbar-content">
        {/* LOGO */}
        <div className="logo-container">
          <img
            src="/images/Logosinfondo.jpg"
            alt="Logo Artemares"
            className="logo-img"
          />
        </div>

        {/* ENLACES */}
        <ul className="nav-links">
          <li>
            <Link to="/">Inicio</Link>
          </li>
          <li>
            <Link to="/productos">Productos</Link>
          </li>
          <li>
            <Link to="/recetas">Recetas</Link>
          </li>
        </ul>
      </div>
    </nav>
  );
}
