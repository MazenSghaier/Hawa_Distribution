import React from "react";
import Navbar from "../components/Home/Navbar";
import About from '../components/Home/About';
import Screen_home from '../components/Home/Screenhome';
import Project from '../components/Home/Project';
import Footer from '../components/Home/Footer';
import Description from '../components/Home/Description';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'

const Home = () => {

    return (
        
    <>
        <Navbar></Navbar>
        <Screen_home></Screen_home>
        <About></About>
        <Project></Project>
        <div className="my-padding">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12949.779627818107!2d10.849470708813994!3d35.764446084350695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x130212d6df016097%3A0x528cc1e524eece77!2z2KfZhNmF2YDYudmH2K8g2KfZhNi52KfZhNmKINmE2YTYpdi52YTYp9mF2YrYqSDZiNin2YTYsdmK2KfYttmK2KfYqiDYqNin2YTZhdmG2LPYqtmK2LE!5e0!3m2!1sar!2stn!4v1674598499312!5m2!1sar!2stn" width="100%" height="350" border="0" allowFullScreen="" loading="lazy" referrerPolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <Description></Description>
        <Footer></Footer>
    </>

    )
}

export default Home;
