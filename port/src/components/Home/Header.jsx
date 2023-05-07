import React from "react";
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import "./../../App.css";

import { Link } from "react-router-dom";

const Header = () => {

    return (
        <> 
            <head>

                <meta charset="UTF-8"/>
                <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
                <title>Complete Responsive Save Nature Website Design Tutorial</title>
          
            </head>

            <header>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
            
                <Link to="/" className="logo"><FontAwesomeIcon icon="fas fa-anchor" /> Marine Ford</Link>

                <nav className="navbar">
                <ul>
                    <li><Link to="/">Accueil</Link></li>
                    <li><Link to="#home-service">Produits</Link></li>
                    <li><Link to="#home-project">Projects</Link></li>
                    <li className="menu"><Link to="/">Articles</Link>
                <ul className="navas">
                <br/><li><Link to="/">Tous les articles</Link></li><hr className="hr1"/><br/><br/>
                <form action=""method="get">
                    <li><Link to="/">Déchets organiques</Link></li><hr className="hr1"/><br/><br/>
                    <li><Link to="/">Déchets hospitaliques</Link></li><hr className="hr1"/><br/><br/>
                    <li><Link to="/">Déchets industriels</Link></li><hr className="hr1"/>
                </form>
                </ul>
                </li>
                    <li><Link to="/">Nos références</Link></li>
                    <li><Link to="#home-about">A propos</Link></li>
                </ul>
                </nav>

                <FontAwesomeIcon icon="fa-solid fa-bars" />

            </header>
        </>
    )
}

export default Header;
