import "./ContactFormStyles.css";
import "./../../App.css";
function ContactForm() {
  return (
    <div className="from-container">
      <h1 >Envoyez-nous un message</h1>
      <form>
        <input placeholder="Nome"/>
        <input placeholder="Email"/>
        <input placeholder="Sujet"/>
        <textarea placeholder="Message" rows="4"></textarea>
        <button className="btn">Envoyer</button>
      </form>
    </div>
  );
}

export default ContactForm;
