function Line(props){
    let from = props.from;
    let fromSize = props.fromSize / 2;
    let to = props.to;
    let toSize = props.toSize / 2;
  
    if (to.x + toSize < from.x + fromSize) {
      from = props.to;
      fromSize = props.toSize / 2;
      to = props.from;
      toSize = props.fromSize / 2;
    }
    const len = Math.sqrt(Math.pow((from.x + fromSize) - (to.x + toSize), 2) + Math.pow((from.y + fromSize) - (to.y + toSize), 2));
    const angle = Math.atan(((to.y + toSize) - (from.y + fromSize)) / ((to.x + toSize) - (from.x + fromSize)));

    const style = {
      position: 'absolute',
      transform: `translate(${from.x + fromSize - .5 * len * (1 - Math.cos(angle))}px, ${from.y + fromSize + .5 * len * Math.sin(angle)}px) rotate(${angle}rad)`,
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