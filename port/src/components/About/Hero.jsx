import React, { useState, useEffect } from 'react';
import "./../../App.css";
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';


const Hero = () => {

  const [inputs, setInputs] = useState([{}]);

  const importAll = (r) => {
    let images = {};
    r.keys().map((item, index) => { 
        images[item.replace('./', '')] = r(item); 
    });
    return images;
  }
  
  const images = importAll(require.context('./../../Images/', false, /\.(png|jpe?g|svg)$/));

  useEffect(() => {
    fetch('http://127.0.0.1/Port/port/src/components/About/about_api.php/images_texts')
        .then(response => response.json())
        .then(data => {
            setInputs(data);
            
            if(data.length === 0){
              console.log("data.length === 0")
          }
        }).catch(error => console.log(error));
  }, []);
  const currentImage = images[inputs[0].image];
  return (
    <div className="references" id="references">
           
            <div className="slide" style={{ backgroundImage: `url(${currentImage})`}}>
            <div className="content">
                <span>{inputs[0].titre}</span>
                <h3>{inputs[0].contenu}</h3>
            </div>
        </div>
</div>
  );
};

export default Hero;
