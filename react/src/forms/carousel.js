import React from "react";
import { withRouter, Link } from "react-router-dom";
import Row from "react-bootstrap/Row";
import Col from "react-bootstrap/Col";
import Carousel from 'react-multi-carousel';

import "./forms.css";
import "react-toastify/dist/ReactToastify.css";
import 'react-calendar/dist/Calendar.css';
import 'react-multi-carousel/lib/styles.css';

const responsive = {
    desktop: {
      breakpoint: { max: 3000, min: 1024 },
      items: 4,
      paritialVisibilityGutter: 0
    },
    tablet: {
      breakpoint: { max: 1024, min: 464 },
      items: 3,
      paritialVisibilityGutter: 0
    },
    mobile: {
      breakpoint: { max: 464, min: 0 },
      items: 1,
      paritialVisibilityGutter: 0
    }
};


class carousel extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      switchView: true,
    };
  }
  render() {
    return (
      <div>
        <div>
          <div className="form_mainDiv_carousel">
            <center>
                <Carousel
                    autoPlay={true}
                    autoPlaySpeed={1700}
                    infinite={true}
                    ssr
                    partialVisible 
                    itemClass="image-item"
                    responsive={responsive}
                >
                    <img src={require('../assets/swift_dezire.png')} className="carousel_image"/>
                    <img src={require('../assets/ertiga.png')} className="carousel_image"/>
                    <img src={require('../assets/force_traveller.png')} className="carousel_image"/>
                    <img src={require('../assets/ford_endavour.png')} className="carousel_image"/>
                    <img src={require('../assets/royal_enfield.png')} className="carousel_image"/>
                    <img src={require('../assets/ntorq.png')} className="carousel_image"/>
                </Carousel>
            </center>
          </div>
        </div>
      </div>
    )
  }
}
export default withRouter(carousel);
