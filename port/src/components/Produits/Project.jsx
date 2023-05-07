import React, { useState , useEffect} from "react";
import "./../../App.css";
import { Link } from "react-router-dom";

const Project = () => {
    const [inputs, setInputs] = useState([]);
    const [currentPage, setCurrentPage] = useState(1);
    const [totalPages, setTotalPages] = useState(1);
    const [loading, setLoading] = useState(true);
    const itemsPerPage = 6;

    useEffect(() => {
      try {
        fetch(`http://127.0.0.1/Port/port/src/components/Produits/produits.php/images_texts?page=${currentPage}&per_page=${itemsPerPage}`)
            .then(response => response.json())
            .then(data => {
              console.log(data);
              setInputs(data.images_texts);
              setTotalPages(data.total_pages);
              setLoading(false);
          });
      } catch (error) {
        console.error(error);
      }
    }, [currentPage]);
    
      const handlePageChange = (page) => {
        setCurrentPage(page);
      }
    console.log(inputs)
      if (!inputs) { return <div>Loading...</div> }
    
      else if (inputs.length === 0) {
        return <div>No items found</div>
      }

    return (
      <div className="home-project " id="home-project">

        <h1 className="heading"> Produits populaires </h1>
        <h4 className="contenu">Nos produits saisonniers</h4>
        {inputs.map((input,index) => (
         <div key={index} className="pro-container">
            <Link to={`/produit/${input.id}`}>
              <div className="pro">
                <img src={input.image ? require(`./../../Images/${input.image}`) : null } alt=""/> 
                <div className="icons">
                    <span>{input.titre}</span>
                    <h5>{input.resume}</h5>
                    <div className="stars">
                      <i className="fas fa-star"></i>
                      <i className="fas fa-star"></i>
                      <i className="fas fa-star"></i>
                      <i className="fas fa-star"></i>
                      <i className="fas fa-star"></i>
                    </div>
                    <h4>{input.prix} DT</h4>
                </div>
                </div>
            </Link>
          </div>
        ))}
        <div className="pagination" id="pagination">
          {Array.from({length: totalPages}, (_, i) => (
              <a key={i+1} href="#" onClick={() => handlePageChange(i+1)}>{i+1}</a>
          ))}
        </div>
    </div>
  )
}

export default Project;

