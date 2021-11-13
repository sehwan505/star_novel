import React, { useState, useEffect } from 'react';
import { useHistory } from 'react-router';
import Line from "./Line";
import Box from "@material-ui/core/Box";
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faStar } from "@fortawesome/free-solid-svg-icons";

function StarButton(props){
    const history = useHistory();
    const [hover, setHover] = useState(false);
    
    function handleClick(starId) {
        console.log(starId);
        if (starId !== undefined){
            history.push(`detail/${starId}/`);
        }
    };

    return(
        <>
            <div onClick={() => {handleClick(props.starId);}} onMouseEnter={() => {setHover(true)}} onMouseLeave={() => {setHover(false)}}>
                <FontAwesomeIcon icon={faStar} style={{"backgroundColor": "rgba( 255, 255, 255, 0 )", 
                                   "color":"white",
                                   "cursor":"pointer",
                                   "fontSize":`${props.size}px`,
                                   "position":"absolute",
                                   "left":`${props.location.x}px`,
                                   "top":`${props.location.y}px`,
                                   "filter": "drop-shadow(0 0 5px white)"
                                   }}/>
            </div>
            {props.links && 
                props.links.map((link) => <Line from={props.location} to={link.location} fromSize={props.size} toSize={link.size}/>)
            }
            {hover && 
                <>
                    <Box
                        sx={{
                            width: 300,
                            height: 300,
                            backgroundColor: 'primary.dark',
                            '&:hover': {
                            backgroundColor: 'primary.main',
                            opacity: [0.9, 0.8, 0.7],
                            },
                        }}
                        />
                </>
            }
        </>
    );
}

export default StarButton;
