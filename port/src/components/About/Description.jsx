import React, { useState, useEffect } from 'react';
import "./../../App.css";


const Description = () => {

    const [inputs, setInputs] = useState({});

    useEffect(() => {
      fetch('http://127.0.0.1/Port/port/src/components/About/about_images.php/images_texts')
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
    <div className="image-card-container">
      
        <div  className="image-card">
          <img src={require(`./../../Images/${inputs[0].image}`)} alt=""/> 
          <div className="image-card-content">
            <h3 className="image-card-title">{inputs[0].titre}</h3>
            <p className="image-card-description">{inputs[0].contenu}</p>
          </div>
        </div>

        <div  className="image-card">
          <img src={require(`./../../Images/${inputs[1].image}`)} alt=""/> 
          <div className="image-card-content">
            <h3 className="image-card-title">{inputs[1].titre}</h3>
            <p className="image-card-description">{inputs[1].contenu}</p>
          </div>
        </div>

        <div  className="image-card">
          <img src={require(`./../../Images/${inputs[2].image}`)} alt=""/> 
          <div className="image-card-content">
            <h3 className="image-card-title">{inputs[2].titre}</h3>
            <p className="image-card-description">{inputs[2].contenu}</p>
          </div>
        </div>
    </div>
  );
};

export default Description;