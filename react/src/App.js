import React, { Component } from "react";
import { BrowserRouter as Router, Route, Switch } from "react-router-dom";
import booking from "./forms/booking";
import carousel from "./forms/carousel";
import 'bootstrap/dist/css/bootstrap.min.css';

class App extends Component {
  render() {
    return (
      <Router>
        <Switch>
          <Route exact path="/" component={booking} />
          <Route exact path="/carousel" component={carousel} />
        </Switch>
      </Router>
    );
  }
}

export default App;