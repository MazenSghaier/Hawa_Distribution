import React, { useState, useEffect } from 'react';
import './Slider.css';

const Slider = (props) => {

  const [inputs,setInputs] = useState(0);

  useEffect(() => {
    fetch('http://localhost/TGE_Project/api.php')
        .then(response => response.json())
        .then(data => {
            setInputs(data);
            console.log(data[0],data[1],data[2]);
        });
    }, []);


  const checkInputsProperties = (inputs) => {
    inputs.forEach((input) => {
        if (!input.hasOwnProperty('image') || !input.hasOwnProperty('titre') || !input.hasOwnProperty('contenu')) {
            throw new Error('Input missing required properties')
        }
    })
}

  const [currentIndex, setCurrentIndex] = useState(0);
  const [isPaused, setIsPaused] = useState(false);

  useEffect(() => {
    let intervalId;
    if (isPaused===false) {
      intervalId = setInterval(() => {
        nextSlide();
      }, 3000);
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

  if (!inputs ) { return <div>{console.log("No inputs found")}</div> }

  else if (!Array.isArray(inputs)) {  return <div>{console.log("!Array.isArray(inputs)")}</div> }

  else if (inputs.length === 0) {
    return <div>{console.log("inputs.length === 0")}</div>
  }

    checkInputsProperties(inputs);

  return (
    <div className="slider-container">
      <button className="prev-button" onClick={prevSlide}>Previous</button>
      <div className="slider-content ">
        <img src={`http://192.168.1.105:8080/src/Images/${inputs[currentIndex].image}`} alt='Portrait'  />
        {console.log(`http://192.168.1.105:8080/src/Images/${inputs[currentIndex].image}`)}
        <span>{inputs[currentIndex].titre}</span>
        <h3>{inputs[currentIndex].contenu}</h3>
      </div>
      <button className="next-button" onClick={nextSlide}>Next</button>
      <div className="dots-container">
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
    </div>
  )
}

export default Slider;
