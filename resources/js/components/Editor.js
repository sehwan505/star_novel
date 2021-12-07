import React, {useState} from "react";
import "@toast-ui/editor/dist/toastui-editor.css";
import { Editor } from "@toast-ui/react-editor";
import { toast } from 'react-toastify';
import axios from "axios";
import '../../css/editor.css';
import {useHistory} from "react-router-dom";

const DraftEditor = ({starId}) => {
  const editorRef = React.createRef();
  const [postTitle , setPostTitle] = useState("");
  const history = useHistory();

  const onSubmit = (event) => {
    event.preventDefault();
    if (postTitle === "")
    {
      toast.error("제목이 없습니다");
      return ;
    }
    if(editorRef.current.getInstance().getMarkdown() === ""){
      toast.error("내용이 없습니다");
      return ;
    }
    if (editorRef.current.getInstance().getMarkdown().length > 500){
      toast.error("500자를 초과했습니다.");
      return ;
    }
    const header = {
      headers: {
        headers: {'Content-Type': 'application/json'}	
      }
    }
    if (starId)
    {      
      axios.post('http://127.0.0.1:8000/boards/link_star', {
          title: postTitle,
          story: editorRef.current.getInstance().getMarkdown(),
          starId: starId
      }, header).then((response) => {
        history.push('/');
      })
      .catch((error) => {
        toast.error("오류가 발생했습니다.");
        console.log(error);
      })
    }
    else{
      axios.post('http://127.0.0.1:8000/boards/', {
        title: postTitle,
        story: editorRef.current.getInstance().getMarkdown(),
      }, header).then((response) => {
        history.push('/');
      })
      .catch((error) => {
        toast.error("오류가 발생했습니다.");
        console.log(error);
      })
    }
  }

  const onChangeTitle = (event) => {
    const {
      target: { value },
      
    } = event;
    setPostTitle(value);
  }

  return (
    <>
    <div className="editor">
      {starId ? 
      <>
        <h1 className="input_title">별자리 연결하기</h1>
      </>
      :
      <>
        <h1 className="input_title">글쓰기</h1>
      </>
      }
      <hr/>
      <div>
        <div className="inputbox">
          <p>제목</p>
          <input className="textbox1" type="text" minlength="5" value={postTitle}
            placeholder="글을 한 마디로 정리해줄 수 있는 제목을 적어주세요." name="title" onChange={onChangeTitle}
            maxLength={40}/>
        </div>
        </div>
        <br/><br/>
        <Editor
          previewStyle="vertical"
          height="300px"
          initialEditType="wysiwyg"
          placeholder="글쓰기"
          name="content"
          hideModeSwitch={true}
          ref={editorRef}
        />
        <span className="submit" onClick={onSubmit}>글쓰기</span>
    </div>
    </>
  );
};
export default DraftEditor;