import { motion } from "framer-motion";
import "./Home.css";
import { useRef } from "react";
import { Button } from "../components/Button";

export default function Home() {
  const aboutRef = useRef(null);

  const scrollToAbout = () => {
    const offset = 53; // para controlar cuánto se mueve
    const y =
      aboutRef.current.getBoundingClientRect().top + window.scrollY - offset;
    window.scrollTo({ top: y, behavior: "smooth" });
  };

  return (
    <>
      <section className="video-hero">
        <video className="background-video" autoPlay loop muted playsInline>
          <source src="/videos/video-3.mp4" type="video/mp4" />
        </video>

        <motion.div
          initial={{ opacity: 0, y: 30 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 1.2 }}
          className="button-container"
        >
          <Button
            buttonStyle="btn--primary"
            buttonSize="btn--medium"
            onClick={scrollToAbout}
          >
            Saber más
          </Button>
        </motion.div>
      </section>

      <section ref={aboutRef} className="hero">
        <motion.div
          className="overlay"
          initial={{ opacity: 0, y: 50 }}
          whileInView={{ opacity: 1, y: 0 }}
          transition={{ duration: 1 }}
          viewport={{ once: true }}
        >
          <div className="hero-image">
            <img src="/images/Mariscos1.jpg" alt="Productos del mar" />
          </div>

          <div className="hero-text">
            <h1>¿Quiénes somos?</h1>
            <p>
              En <strong>Distribuidora Artemares</strong> nos especializamos en
              la venta y distribución de productos del mar, ofreciendo mariscos
              y pescados de la más alta calidad a restaurantes, hoteles y
              hogares. Nuestro compromiso es garantizar frescura, sabor y un
              servicio responsable con el medio ambiente.
            </p>
            <p>
              Desde nuestras costas, trabajamos cada día para acercar el océano
              a tu mesa, impulsando la pesca local y fomentando la
              sostenibilidad marina.
            </p>
          </div>
        </motion.div>
      </section>
    </>
  );
}
