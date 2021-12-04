import React from "react";
import { BrowserRouter as Router, Route, Switch } from "react-router-dom";
import { ToastContainer } from "react-toastify";
import ReactDOM from 'react-dom';
import Home from "./routes/Home";
import Detail from "./routes/Detail";
import Write from "./routes/Write";

const AppRouter = () => {
  return (
    <Router>
      <ToastContainer
        // style={{ fontSize: "1.3rem", width: "85%" }}
        // autoClose="2000"
        // position="top-center"
      />
      <Switch>
        <Route exact path="/">
            <Home />
        </Route>
        <Route exact path="/detail/:id/" render={(id) => <Detail post_id={id}/>}/>
        <Route exact path="/write">
            <Write />
        </Route>
      </Switch>
    </Router>
  );
};

export default AppRouter;

if (document.getElementById('appRouter')) {
  ReactDOM.render(<AppRouter />, document.getElementById('appRouter'));
}