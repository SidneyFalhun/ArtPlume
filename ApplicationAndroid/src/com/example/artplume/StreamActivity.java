package com.example.artplume;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.ArrayList;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.net.ParseException;
import android.os.Bundle;
import android.app.Activity;
import android.content.Context;
import android.util.Log;
import android.view.Menu;
import android.webkit.WebSettings;
import android.webkit.WebSettings.PluginState;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.Toast;

public class StreamActivity extends Activity {
	String lienStream ="http://youtube.com";
	 String result = null;
	 InputStream is = null;
     JSONObject json_data=null;
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.stream);
		
	    // on recupere le lien de stream avec la page lireStream, et on l'insère dans la variable lienStream avec Json
	     ArrayList<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>();
	     //ArrayList<String> donnees = new ArrayList<String>();
	     			ConnectivityManager connMgr = (ConnectivityManager) 
	    	        getSystemService(Context.CONNECTIVITY_SERVICE);
	    	    NetworkInfo networkInfo = connMgr.getActiveNetworkInfo();
	    	    if (networkInfo != null && networkInfo.isConnected()) {

	     try{
	     //commandes httpClient
	    	 HttpClient httpclient = new DefaultHttpClient();
	        HttpPost httppost = new HttpPost("http://172.20.21.100/artplume/android/index.php?page=lireStream");
	        httppost.setEntity(new UrlEncodedFormEntity(nameValuePairs));
	        HttpResponse response = httpclient.execute(httppost);
	        HttpEntity entity = response.getEntity();
	        is = entity.getContent();
	     }
	     catch(Exception e){
	      Log.i("taghttppost",""+e.toString());
	            Toast.makeText(getBaseContext(),e.toString() ,Toast.LENGTH_LONG).show();
	       }
	   
	      
	     //conversion de la réponse en chaine de caractère
	        try
	        {
	         BufferedReader reader = new BufferedReader(new InputStreamReader(is,"UTF-8"));
	        
	         StringBuilder sb  = new StringBuilder();
	        
	         String line = null;
	        
	         while ((line = reader.readLine()) != null)
	         {
	         sb.append(line + "\n");
	         }
	        
	         is.close();
	        
	         result = sb.toString();
	        }
	        catch(Exception e)
	        {
	         Log.i("tagconvertstr",""+e.toString());
	        }
	        //recuperation des donnees json
	        try{
	          JSONArray jArray = new JSONArray(result);
	           
	             for(int i=0;i<jArray.length();i++)
	             {
	            	 	
	                   json_data = jArray.getJSONObject(i);
	                   lienStream =   json_data.getString("str_lien");
	                   
	                   
	             }
	               //
	            }
	            catch(JSONException e){
	             Log.i("tagjsonexp",""+e.toString());
	            } catch (ParseException e) {
	             Log.i("tagjsonpars",""+e.toString());
	       }
	    	    }
	    	    final String lien = lienStream;
	    	    WebView myWebView = (WebView) findViewById(R.id.webstream);
	    	   
	           	    if (networkInfo != null && networkInfo.isConnected())
	           	    {
	           	    	myWebView.loadUrl(lien);
	           	    }
	           	 else
	     	    {
	           		 myWebView.loadDataWithBaseURL(null, "<html><style type=\"text/css\"> body {color: white ;background-color: black }</style><body>Vous devez être connecté à internet pour accéder à l'application</body></html>", "text/html", "utf-8", null);
	     	    }
	    		WebSettings webSettings = myWebView.getSettings();
	    		webSettings.setJavaScriptEnabled(true);
	    		webSettings.setPluginsEnabled(true);
	    		webSettings.setPluginState(PluginState.ON);
	    		myWebView.setWebViewClient(new WebViewClient());
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.stream, menu);
		return true;
	}

}
