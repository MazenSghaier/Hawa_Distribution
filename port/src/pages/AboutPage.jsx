import React from "react";
import Navbar from "../components/Home/Navbar";
import Abourt from '../components/About/abourt';
import Hero from "../components/About/Hero";
import Description from '../components/About/Description';
import Footer from '../components/Home/Footer';

const AboutPage = () => {

    return (
        
    <>
        <Navbar></Navbar>
        <Hero></Hero>
        <Abourt></Abourt>
        <Description></Description>
        <Footer></Footer>
    </>

    )
}

export default AboutPage;
