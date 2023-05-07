import React, { useState } from "react";
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import "./../../App.css";
import { Link } from "react-router-dom";

const Post = () => {

    return (
    <div className="home-post reveal" id="home-post">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <h1 className="heading"> <FontAwesomeIcon icon="fas fa-quote-left"/> Nos articles récents <FontAwesomeIcon icon="fas fa-quote-right"/> </h1>
    
    <div className="box-container ">
            
        <div className="box">
                
                <img src="/" alt=""/> 
                
            <div className="content">
                <span> <i className="fas fa-calendar"></i> </span>
                <h3></h3>
                <p></p>
                <a href="article.php"><button className="btn">Voir plus</button></a>
            </div>
            
        </div>
    
    </div>
    
    </div>
    )
}

export default Post;