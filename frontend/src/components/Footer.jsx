import "./Footer.css";

export default function Footer() {
  return (
    <footer className="footer">
      <div className="footer-inner">

        <div className="footer-section">
          <h4 className="footer-title">Distribuidora Artemares</h4>
          <p className="footer-description">
            Productos del mar seleccionados con frescura garantizada y entregas confiables.
          </p>
        </div>

        <div className="footer-section">
          <h4 className="footer-subtitle">Contacto</h4>
          <ul className="footer-list">
            <li><span>📞</span> +56 9 5439 9106</li>
            <li><span>⏰</span> Lunes a sábado — 09:00 a 19:00</li>
          </ul>
        </div>

        <div className="footer-section">
          <h4 className="footer-subtitle">Ubicación y cobertura</h4>
          <ul className="footer-list">
            <li><span>📍</span> Sargento Candelaria 60, Penco – Biobío</li>
            <li><span>🚚</span> Tomé, Penco, Lirquén y Concepción</li>
          </ul>
        </div>

      </div>

      <div className="footer-bottom">
        <p>© 2025 Artemares · Todos los derechos reservados</p>
      </div>
    </footer>
  );
}
