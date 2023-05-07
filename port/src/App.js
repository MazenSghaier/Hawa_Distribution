import './App.css';
import React  from 'react';
import {BrowserRouter,Routes,Route}from 'react-router-dom'
import Home from './pages/Home';
import AboutPage from './pages/AboutPage';
import Produits from './pages/Produits';
import Contact from './pages/Contact';
import Produit from './components/Produits/Produit';

function App() {
  return (
      <BrowserRouter>
        <Routes>
          <Route path="/" element={ <Home/>} exact/>
          <Route path="/AboutPage" element={ <AboutPage/>} />
          <Route path="/Produits" element={ <Produits/>} />
          <Route path="/Contact" element={ <Contact/>} />
          <Route path="/produit/:id" element={ <Produit/>} />
        </Routes>
      </BrowserRouter>
  );
}

export default App;
