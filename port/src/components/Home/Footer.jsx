import React, { useState } from "react";
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import "./../../App.css";
import { Link } from "react-router-dom";
import { FooterItems } from "./MenuItems";

const Footer = () => {

    return (
        
        <div className="footer ">

        <div className="box-container ">
            <div className="box">
                    <h3>Liens rapides</h3>
            {FooterItems.map((item,index)=>{
             return(
              <Link key={index} to={item.url} > <i className={item.icon}></i>{item.title}</Link>
             )
            })}
        
            </div>
        
            <div className="box">
                    <h3>Suivez-nous</h3>
                    <a href="#"><i className="fab fa-facebook-f ia"></i> facebook </a>
                    <a href="#"><i className="fab fa-twitter ia"></i> twiter </a>
                    <a href="#"><i className="fab fa-linkedin ia"></i> linkedin </a>
        
            </div>
        
            <div className="box">
                    <h3>Contact info</h3>
        
                    <a href="#"><i className="fas fa-phone ia"></i> +216 54545545</a>
                    <a href="#"><i className="fas fa-phone ia"></i> +216 55545470</a>
                    <a href="#"><i className="fas fa-envelope ia"></i> contact@tge.tn</a>
                    <a href="#"><i className="fas fa-map ia"></i> 33 rue Farhat Hached 5080 Teboulba, Tunisia </a>
                    
             </div>
        
        </div>
        
        
        </div>
    )
}

export default Footer;