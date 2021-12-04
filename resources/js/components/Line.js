function Line(props){
    let fromX = props.fromX;
    let fromY = props.fromY;
    let fromSize = props.fromSize / 2;
    let toX = props.toX;
    let toY = props.toY;
    let toSize = props.toSize / 2;
  
    if (toX + toSize < fromX + fromSize) {
      fromX = props.toX;
      fromY = props.toY;      
      fromSize = props.toSize / 2;
      toX = props.fromX;
      toY = props.fromY;
      toSize = props.fromSize / 2;
    }
    const len = Math.sqrt(Math.pow((fromX + fromSize) - (toX + toSize), 2) + Math.pow((fromY + fromSize) - (toY + toSize), 2));
    const angle = Math.atan(((toY + toSize) - (fromY + fromSize)) / ((toX + toSize) - (fromX + fromSize)));

    const style = {
      position: 'absolute',
      transform: `translate(${fromX + fromSize - .5 * len * (1 - Math.cos(angle))}px, ${fromY + fromSize + .5 * len * Math.sin(angle)}px) rotate(${angle}rad)`,
      width: `${len}px`,
      height: `${0}px`,
      borderBottom: '2px solid white',
      zIndex: '-10' 
    };

    return(
        <>
            <div style={style} />
        </>
    )
}

export default Line;