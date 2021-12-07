import React, { useEffect, useState } from "react";
import "../../css/detail.css";
import axios from "axios";
import { useHistory } from "react-router-dom";
import RelativeStarButton from "../components/RelativeStarButton";
import TimeForToday from "../components/TimeForToday";
import { toast } from 'react-toastify';
import { makeStyles } from '@material-ui/core/styles';
import Table from '@material-ui/core/Table'
import TableBody from '@material-ui/core/TableBody'
import TableCell from '@material-ui/core/TableCell'
import TableRow from '@material-ui/core/TableRow'
import TableContainer from '@material-ui/core/TableContainer';
import ThumbUpIcon from '@material-ui/icons/ThumbUp';
import DeleteIcon from '@material-ui/icons/Delete';
import HomeIcon from '@material-ui/icons/Home';


function Detail({post_id}){
  const [post, setPost] = useState([]);
  const [links, setLinks] = useState([]);
  const history = useHistory();
  const id = post_id.match.params.id;

  const useStyles = makeStyles(theme => ({
    table: {
      fontSize: 20,
      height : '10px'
    },
    cell: {
      fontSize: 20,
    },
    }));
  const classes = useStyles();

  
  useEffect(async() => {
		try {
			window.scrollTo(0,0);
			const res = await fetch(`http://127.0.0.1:8000/boards/${id}/`,{
          headers: {'Content-Type': 'application/json'},
          method: 'GET'
        })
			const posts = await res.json()
      console.log(posts);
			setPost(posts[0]);
      setLinks(posts[1]);
		}
		catch (e) {
			console.log(e);
		}

  }, [post_id]);

  const onDeleteClick = async () => {
    const ok = window.confirm("진짜 지우시겠습니까?");
    if (ok) {
      axios.delete(`http://127.0.0.1:8000/boards/${id}/`, {
      }, {
        headers: {'Content-Type': 'application/json'}
      }).then(() => {
        toast.success('삭제 완료');
        history.push('/');
      })
      .catch((error) => {
        history.push('/');
      })
    }
  };

  const onLikeClick = () => {
      axios.post(`http://127.0.0.1:8000/like/${id}/`, {
      }, {
        headers: {'Content-Type': 'application/json'}
      }).then(() => {
        setPost(prev => ({...prev, size: prev.size + 3}));
      })
      .catch((error) => {
      })
  }

  return (
	  <>
      <div className="fullscreen">
        <div className="body-wrap">
          <TableContainer>
            <Table className={classes.table}>
            <colgroup>
                <col width="80%" />
                <col width="20%" />
            </colgroup>
              <TableBody>
              <TableRow>
                <TableCell className={classes.cell}>
                  {post.title}
                </TableCell>
                <TableCell style={{float:"right"}} className={classes.cell}>
                  {TimeForToday(post.created_at)}
                </TableCell>
              </TableRow>    
              <TableRow size="small">
                <TableCell className={classes.cell}>
                    <label>
                      작성자A
                    </label>
                </TableCell>
                <TableCell style={{float:"right"}} className={classes.cell}>
                  <DeleteIcon onClick={onDeleteClick} style={{"cursor": "pointer"}}>삭제</DeleteIcon>&nbsp;<HomeIcon style={{"cursor": "pointer"}} onClick={() =>{history.push('/');}}/>
                </TableCell>
              </TableRow>
              <TableRow>
                <TableCell className={classes.cell}>{post.story}</TableCell>
                <TableCell style={{float:"right"}} className={classes.cell}>
                  <span style={{top:"2px", bottom:"2px"}}>{(post.size - 20) / 3}</span><ThumbUpIcon onClick={onLikeClick} style={{"cursor": "pointer"}}/>
                </TableCell>
              </TableRow>
              <TableRow>
                {/* <TableCell colSpan="2">
                  댓글 &nbsp;&nbsp;&nbsp;<span>{commentItemsCount}</span>&nbsp;개
                </TableCell> */}
              </TableRow>
              </TableBody>
            </Table>
            </TableContainer>
            <div>
              <RelativeStarButton key={post.id} starId={post.id} x={post.x} y={post.y} links={links} size={post.size}/>
            </div>
        </div>
      </div>
    </>
  );
};

export default Detail;