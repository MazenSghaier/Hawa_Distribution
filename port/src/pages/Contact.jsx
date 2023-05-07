import React from "react";
import Navbar from "../components/Home/Navbar";
import ContactForm from '../components/Contact/ContactForm';
import ContactDetails from '../components/Contact/ContactDetails';
import Hero from "../components/Contact/Hero";
import Footer from '../components/Home/Footer';

const Contact = () => {

    return (
        
    <>
        <Navbar></Navbar>
        <Hero></Hero>
        <ContactDetails></ContactDetails>
        <ContactForm></ContactForm>
        <Footer></Footer>
    </>

    )
}

export default Contact;