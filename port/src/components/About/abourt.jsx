import React, { useState, useEffect } from 'react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import "./../../App.css";
import { library } from '@fortawesome/fontawesome-svg-core';
import { faQuoteLeft, faQuoteRight } from '@fortawesome/free-solid-svg-icons';

library.add(faQuoteLeft, faQuoteRight);

const Abourt = () => {
    const [inputs, setInputs] = useState({});

    useEffect(() => {
      fetch('http://127.0.0.1/Port/port/src/components/Php_folder/about.php/about')
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
        <div className="home-about" id="home-about">

        <h1 className="heading"> <FontAwesomeIcon icon="quote-left"  color="#9fc5e8" /> À propos de nous <FontAwesomeIcon icon="quote-right" color="#9fc5e8" /> </h1>

        <div className="row">
            <div className="image">
                <img src={require(`./../../Images/${inputs[0].image}`)} alt=""/>  
            </div>
            <div className="content">
                <h3>{inputs[0].titre}</h3>
                <p>{inputs[0].contenu}</p>
            </div>
        </div>


        </div>
    )
}

export default Abourt;