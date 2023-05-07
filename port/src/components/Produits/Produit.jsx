import React, { useState, useEffect } from "react";
import "./../../App.css";
import Navbar from "./../Home/Navbar"
import Footer from "./../Home/Footer"
import Project from "./../Home/Project"
import { useParams } from "react-router-dom";



const Produit = () => {

    const { id } = useParams();

    const [selectedProduct, setSelectedProduct] = useState(null);
    useEffect(() => {
        fetch(`http://127.0.0.1/Port/port/src/components/Produits/produit.php?id=${id}`)
            .then(response => response.json())
            .then(data => {
                setSelectedProduct(data[0]);
            })
            .catch(err => {
                console.log(err);
            });
    }, [id]);

    if (!selectedProduct) {
        return <p>Loading...</p>;
    }
    console.log(selectedProduct)

    const importAll = (r) => {
        let images = {};
        r.keys().map((item, index) => {
            images[item.replace('./', '')] = r(item);
        });
        return images;
    }

    const images = importAll(require.context('./../../Images/', false, /\.(png|jpe?g|svg)$/));
    const currentImage = images[selectedProduct.image];
    const currentImage1 = images[selectedProduct.image2];
    const currentImage2 = images[selectedProduct.image3];
    const currentImage3 = images[selectedProduct.image4];


    return (
        <>
            <Navbar></Navbar>
            <div className="prodetails">
                <div className="single-pro-image">
                    <img src={currentImage} width="100%" id="MainImg" className="main-img" alt="" />
                    <div className="small-img-group">
                        <div className="smal-img-col">
                            <img src={currentImage} width="100%" className="small-img " alt="" onClick={() => {document.getElementById("MainImg").src = currentImage; }}/>
                        </div>
                        <div className="smal-img-col">
                            <img src={currentImage1} width="100%" className="small-img" alt="" onClick={() => {document.getElementById("MainImg").src = currentImage1; }}/>
                        </div>
                        <div className="smal-img-col">
                            <img src={currentImage2} width="100%" className="small-img" alt="" onClick={() => {document.getElementById("MainImg").src = currentImage2; }}/>
                        </div>
                        <div className="smal-img-col">
                            <img src={currentImage3} width="100%" className="small-img" alt="" onClick={() => {document.getElementById("MainImg").src = currentImage3; }}/>
                        </div>
                    </div>
                </div>
                <div className="single-pro-details">
                    <h6>Accueil / Produits / {selectedProduct.titre}</h6>
                    <h4>{selectedProduct.titre}</h4>
                    <h2>{selectedProduct.prix} DT</h2>
                    <div className="stars">
                      <i className="fas fa-star"></i>
                      <i className="fas fa-star"></i>
                      <i className="fas fa-star"></i>
                      <i className="fas fa-star"></i>
                      <i className="fas fa-star"></i>
                    </div>
                    <h4>Détails du Produit</h4>
                    <span>{selectedProduct.resume}</span>
                </div>
            </div>
            <Project></Project>
            <Footer></Footer>
    </>
)
}

export default Produit;