import React, { useState, useEffect } from 'react';
import { __ } from '@wordpress/i18n';
import axios from 'axios';

function PluginData() {

  const [data, setData] = useState(null);

  const homeUrl = wpapi.homeUrl;

  const ajaxUrl = wpapi.ajaxurl;

  const Url = `${homeUrl}/wp-json/wp/v1/blockline`;

  useEffect(() => {
    fetch(`${Url}`)
      .then(response => response.json())
      .then(data => {
        setData(data);
      });  

  }, []);

  if (!data) {
    return <div>Loading...</div>;
  }

   // plugin and theme install
//    function handleInstallClick() {
//    // Make an AJAX request
//    var xhr = new XMLHttpRequest();
//    xhr.open('POST', wpapi.ajaxurl, true); // ajaxurl is a global variable in WordPress that contains the URL to admin-ajax.php
//    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
//    xhr.onreadystatechange = function() {
//        if (xhr.readyState === 4) {
//            if (xhr.status === 200) {
//                var response = JSON.parse(xhr.responseText);
//                if (response.success) {
//                    alert('Plugin installed and activated successfully!');
//                } else {
//                    alert('Error: ' + response.message);
//                }
//            } else {
//                alert('Error: ' + xhr.statusText);
//            }
//        }
//    };

//    // Prepare data to send
//    var data = new FormData();
//    data.append('action', 'install_plugin'); // Replace 'install_plugin' with the actual AJAX action hook
//    data.append('nonce', wpapi.nonce); // Replace 'wpapi.nonce' with the actual nonce value generated in your PHP code
//    // Add any additional data as needed

//    // Send the AJAX request
//    xhr.send(data);
// }
// alert(wpapi.homeUrl2);
// function handleInstallClick() {
//   // Prepare data to send
//   const data = {
//       // Add any additional data as needed
//   };

//   const Url = `${wpapi.homeUrl2}/wp-json/vayu-x-plugin/v1/install-plugin`;
  
//   // Make a POST request to the REST API endpoint
//   fetch(Url, {
//       method: 'POST',
//       headers: {
//           'Content-Type': 'application/json',
//       },
//       body: JSON.stringify(data),
//   })
//   .then(response => {
//       if (!response.ok) {
//           throw new Error('Network response was not ok');
//       }
//       return response.json();
//   })
//   .then(data => {
//       if (data.success) {
//           alert('Plugin installed and activated successfully!');
//       } else {
//           alert('Error: ' + data.message);
//       }
//   })
//   .catch(error => {
//       console.error('There was a problem with the fetch operation:', error);
//       alert('Error: ' + error.message);
//   });

  
// }

// plugin and theme install

const process = async () =>{

  // const params =  {
  //   templateType: props.templateData.free_paid,
  //   plugin: props.templateData.plugin,
  //   allPlugins:wpPlugins,
  //   builder:props.templateData.builder_theme,
  //   themeSlug:getThemeName(),
  //   proThemePlugin:getPluginName('free'),
  //   tmplFreePro:getPluginName()
  // }
  
  const Url = `${wpapi.homeUrl2}/wp-json/vayu-x-plugin/v1/install-plugin`;

    try {
        await axios.post(wpapi.homeUrl2+'/wp-json/vayu-x-plugin/v1/install-plugin', {
            params: {
              plugin: 'vayu-blocks',
              wpUrl:'https://downloads.wordpress.org/',
              thUrl:'https://themehunk.com/wp/data/'                    }
          })
          .then(function (response) {
            console.log(response);
          })
          .catch(function (error) {
            console.log(error);
          })
          .finally(function () {
            // always executed
          });

    } catch (error) {
        console.error('Error fetching data:', error);
      }
}



  function Button(props, actsts, actcls) {

    if(props.inststatus == 'free-installed' || props.inststatus == 'pro-installed' ){
     
      if(props.actstatus == 'true'){

        actsts = 'Activated';
        actcls = 'button btn activated disabled';
  
      }else{
  
        actsts = 'Active Now';
        actcls = 'button btn active-now';
  
      }

    }else{
      
       actsts = 'Install Now';
       actcls = 'button btn install-now'

    }

    const [message, setMessage] = useState(actsts);
    const [updateCls, setupdateCls] = useState(actcls);

    const checkActive = async (e) => {

      setupdateCls('button btn updating-message');

      const data = { 

        init: e.target.dataset.init,
        slug: e.target.dataset.slug,
        instl: e.target.dataset.inststatus, 
        nonce: wpapi.wpnonce, 
        
      };

      const response = await fetch(`${ajaxUrl}?action=vayu_install_plugin`, {
        method: 'POST',
        body: new URLSearchParams(data)
      });

      const plgdata = await response.text();

      try {


       setMessage('Activated');
       setupdateCls('button btn activated disabled');

      } catch (error) {

        console.error('Error parsing JSON:', error);

      }

   }
   
    return (
      <button 
      onClick={checkActive} 
      data-label={message}
      data-init={props.init}
      data-slug={props.slug}
      data-instl={props.instl}
      className={updateCls}
      data-actstatus={props.actstatus}
      data-inststatus={props.inststatus}
      >
      {message}
      </button>
    );

  }
  
  function PluginList(props){

    const { data } = props;
    
    let nameTxt;
    let proDiv;
    let pSlug;
    let pInit;
    let pStatus;
    let pStatusInst;
    

    const renderData = data.map((item) => {

    const renderDataa = Object.keys(item).map((items) => {

      if(item[items].status == 'pro-installed'){
        
        nameTxt = <h4>{item[items].name}<span>{__( 'Pro', 'blockline' )}</span></h4>
        proDiv      ='';
        pSlug       = item[items].init.split("/").shift();
        pInit       = item[items].init;
        pStatus     = item[items].pro;
        pStatusInst = item[items].status;
    
        }else{
        
          nameTxt = <h4>{item[items].name}</h4>
          proDiv  = <a className="doc-link th-go-pro" href={item[items].link}> {__( 'Go Pro', 'blockline' )}</a>;
          pSlug   = item[items].slug;
          pInit   = item[items].init;
          pStatus = item[items].free;
          pStatusInst = item[items].status;

        }

        return (
          <div className="th-option-row content-box">
             <div className="th-col">
              <img src={item[items].imgUrl}/>
            </div>
            <div className="th-col">
            <div className="title-plugin">
                {nameTxt}
                {proDiv}
            </div>
            <Button data-instl={pStatusInst}  init={pInit} slug={pSlug} actstatus={pStatus} inststatus={pStatusInst}>                
            </Button>
            </div>
          </div>
      );

      });

      return renderDataa;

    });
  
    return renderData;

  }

  return (
 
      <div className="recommended-option-wrap">
      <div className="th-option-2-col">
      <PluginList data={data}></PluginList>
      <div className="th-option-row content-box custom-install">
             <div className="th-col">
              <img src="r"/>
            </div>
            <div className="th-col">
            <div className="title-plugin">
                <h4>Vayu Blocks</h4>
            </div>
            <button className="custom-button" onClick={process}>
              Install & Activate
            </button>
            </div>
          </div>
      </div>
      </div>

  );

}

export default PluginData;