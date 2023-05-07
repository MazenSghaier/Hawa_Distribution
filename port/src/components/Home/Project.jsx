import React, { useState , useEffect} from "react";
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import "./../../App.css";
import { Link } from "react-router-dom";

const Project = () => {

    const [inputs, setInputs] = useState([{}]);

    useEffect(() => {
      fetch('http://localhost/Port/port/src/components/Php_folder/project.php/images_texts')
          .then(response => response.json())
          .then(data => {
              setInputs(data);
          });
      }, []);
    
      if (!inputs && inputs !== {} ) { return <div>{console.log("No inputs found")}</div> }
    
      else if (!Array.isArray(inputs)) {  return <div>{console.log("!Array.isArray(inputs)")}</div> }
    
      else if (inputs.length === 0) {
        return <div>{console.log("inputs.length === 0")}</div>
      }

    return (
      <div className="home-project " id="home-project">
        <h1 className="heading"> <FontAwesomeIcon icon="fas fa-quote-left" color="#9fc5e8"/> Nos nouveaux produits <FontAwesomeIcon icon="fas fa-quote-right" color="#9fc5e8"/> </h1>
        {inputs.map((input,index) => (
         <div key={index} className="pro-container">
          <Link to={`/produit/${input.id}`}>
              <div className="pro">
              <img src={input.image ? require(`./../../Images/${input.image}`) : null } alt=""/> 
                <div className="icons">
                    <span>{input.titre}</span>
                    <h5>{input.resume}</h5>
                    <div className="stars">
                      <i className="fas fa-star"></i>
                      <i className="fas fa-star"></i>
                      <i className="fas fa-star"></i>
                      <i className="fas fa-star"></i>
                      <i className="fas fa-star"></i>
                    </div>
                    <h4>{input.prix} DT</h4>
                </div> 
              </div> 
          </Link>
        </div>
         ))}     
    </div>



    )
}

export default Project;