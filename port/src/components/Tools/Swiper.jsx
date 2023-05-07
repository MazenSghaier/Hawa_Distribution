import React, { useState, useEffect, useMemo } from 'react';
import './swiper.css';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faAngleLeft } from '@fortawesome/free-solid-svg-icons';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faAngleRight } from '@fortawesome/free-solid-svg-icons';



library.add(faAngleLeft);
library.add(faAngleRight);
const Slider = () => {

  const importAll = (r) => {
    let images = {};
    r.keys().map((item, index) => { 
        images[item.replace('./', '')] = r(item); 
    });
    return images;
  }
  
  const images = importAll(require.context('./../../Images/', false, /\.(png|jpe?g|svg)$/));

  const [inputs, setInputs] = useState([{image: "", titre: "", contenu: "" }]);

  useEffect(() => {

    fetch('http://127.0.0.1/Port/port/src/components/Php_folder/api.php/images_texts')
        .then(response => response.json())
        .then(data => {
            setInputs(data);
            console.log(data)
            
            if(data.length === 0){
              console.log("data.length === 0")
          }
        }).catch(error => console.log(error));
  }, []);
  const [currentIndex, setCurrentIndex] = useState(0);
  const [isPaused, setIsPaused] = useState(false);

  useEffect(() => {
    let intervalId;
    if (isPaused===false) {
      intervalId = setInterval(() => {
        nextSlide();
      }, 5000);
    }
    return () => clearInterval(intervalId);
  }, [currentIndex, isPaused]);

  const prevSlide = () => {
    const lastIndex = inputs.length - 1;
    const shouldResetIndex = currentIndex === 0;
    const index = shouldResetIndex ? lastIndex : currentIndex - 1;
    setCurrentIndex(index);
  }

  const nextSlide = () => {
    const lastIndex = inputs.length - 1;
    const shouldResetIndex = currentIndex === lastIndex;
    const index = shouldResetIndex ? 0 : currentIndex + 1;
    setCurrentIndex(index);
  }
  
  if (typeof inputs === 'object' && !Array.isArray(inputs)) {  return <div>{console.log("!Array.isArray(inputs)")}</div> }
  else if(!inputs ||!inputs.length) return null;
  
  const currentImage = images[inputs[currentIndex].image];

  return (
    <div className="swiper" >

            <div className="swiper-slide" style={{ backgroundImage: `url(${currentImage})`}}>

                <FontAwesomeIcon className="swiper-button-next" onClick={nextSlide} icon="angle-left" />
                <div className="content">
                    <span>{inputs[currentIndex].titre}</span>
                    <h3>{inputs[currentIndex].contenu}</h3>
                </div> 
                <FontAwesomeIcon className="swiper-button-prev" onClick={prevSlide} icon="angle-right" />
            </div>
        

        {inputs.map((input, index) => {
          return (
            <span 
              key={index} 
              className={`dot ${index === currentIndex ? 'active' : ''}`}
              onClick={() => {
                setCurrentIndex(index);
                setIsPaused(false);
              }}
            >
            </span>
          )
        })}
        
    </div>
  );
};

export default Slider;
