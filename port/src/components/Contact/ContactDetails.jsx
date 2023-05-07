import React, { useState , useEffect} from "react";
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import "./../../App.css";
import { Link } from "react-router-dom";

const ContactDetails = () => {

    return (
      <div className="contact-details" id="home-project">
          <div className="details" >
            <span>GET IN TOUCH</span>
            <h2>Visit one of our agency locations or contact us today</h2>
            <h3>Head Office</h3>
            <div>
                <li>
                    <i className="fas fa-map"></i>
                    <p>56 Glassford Street Glasgow G1 1UL New York</p>
                </li>
                <li>
                    <i className="far fa-envelope"></i>
                    <p>contact@example.com</p>
                </li>
                <li>
                    <i className="fas fa-phone-alt"></i>
                    <p>+216 54545545</p>
                </li>
                <li>
                    <i className="fas fa-phone-alt"></i>
                    <p>+216 55545470</p>
                </li>
                <li>
                    <i className="far fa-clock"></i>
                    <p>Monday to Saturday: 9.00am to 16.00pm</p>
                </li>
            </div>
          </div>
          <div className="map">

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12949.779627818107!2d10.849470708813994!3d35.764446084350695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x130212d6df016097%3A0x528cc1e524eece77!2z2KfZhNmF2YDYudmH2K8g2KfZhNi52KfZhNmKINmE2YTYpdi52YTYp9mF2YrYqSDZiNin2YTYsdmK2KfYttmK2KfYqiDYqNin2YTZhdmG2LPYqtmK2LE!5e0!3m2!1sar!2stn!4v1674598499312!5m2!1sar!2stn" width="600" height="450" border="0" allowFullScreen="" loading="lazy" referrerPolicy="no-referrer-when-downgrade"></iframe>
          
          </div>
      </div>



    )
}

export default ContactDetails;