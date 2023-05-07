import React, { useState, useEffect } from 'react';
import "./../../App.css";
import "./image-card.css";
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
const Description = () => {

    const [inputs, setInputs] = useState({});

    useEffect(() => {
      fetch('http://127.0.0.1/Port/port/src/components/Php_folder/blog.php/images_texts')
          .then(response => response.json())
          .then(data => {
              setInputs(data);
              
          });
      }, []);
      
  if (!inputs ) { return <div>{console.log("No inputs found")}</div> }

  else if (!Array.isArray(inputs)) {  return <div>{console.log("!Array.isArray(inputs)")}</div> }

  else if (inputs.length === 0) {
    return <div>{console.log("inputs.length === 0")}</div>
  }

  return (
    <><h1 className="heading"> <FontAwesomeIcon icon="fas fa-quote-left" color="#9fc5e8"/> Nos nouveaux articles <FontAwesomeIcon icon="fas fa-quote-right" color="#9fc5e8"/> </h1>
    <div className="image-card-container">
      
        <div  className="image-card">
          <img src={require(`./../../Images/${inputs[0].image}`)} alt=""/> 
          <div className="image-card-content">
            <h4 className="image-card-date">{inputs[0].date}</h4>
            <h3 className="image-card-title">{inputs[0].title}</h3>
            <p className="image-card-description">{inputs[0].resume}</p>
          </div>
        </div>

        <div  className="image-card">
          <img src={require(`./../../Images/${inputs[1].image}`)} alt=""/> 
          <div className="image-card-content">
            <h4 className="image-card-date">{inputs[1].date}</h4>
            <h3 className="image-card-title">{inputs[1].title}</h3>
            <p className="image-card-description">{inputs[1].resume}</p>
          </div>
        </div>

        <div  className="image-card">
          <img src={require(`./../../Images/${inputs[2].image}`)} alt=""/> 
          <div className="image-card-content">
            <h4 className="image-card-date">{inputs[2].date}</h4>
            <h3 className="image-card-title">{inputs[2].title}</h3>
            <p className="image-card-description">{inputs[2].resume}</p>
          </div>
        </div>
    </div>
    </>
  );
};

export default Description;