import React, { useState, useEffect } from 'react';
import { useHistory } from 'react-router';
import Line from "./Line";
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import Tooltip from "@material-ui/core/Tooltip";
import { faStar } from "@fortawesome/free-solid-svg-icons";

function StarButton(props){
    const history = useHistory();
    
    function handleClick(starId) {
        if (starId !== undefined){
            history.push(`detail/${starId}/`);
        }
    };

    return(
        <> 
            <Tooltip title={<h1 style={{ color: "lightblue" }}>{props.title}</h1>}>
            <div onClick={() => {handleClick(props.starId);}}>
                <FontAwesomeIcon icon={faStar} style={{"backgroundColor": "rgba( 255, 255, 255, 0 )", 
                                   "color":"white",
                                   "cursor":"pointer",
                                   "fontSize":`${props.size}px`,
                                   "position":"absolute",
                                   "left":`${props.x}px`,
                                   "top":`${props.y}px`,
                                   "filter": "drop-shadow(0 0 5px white)"
                                   }}/>
            </div>
            </Tooltip>
            {props.links && 
                props.links.map((link) => <Line fromX={props.x} fromY={props.y} toX={link.x} toY={link.y}  fromSize={props.size} toSize={link.size}/>)
            }
        </>
    );
}

export default StarButton;
