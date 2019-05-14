/***********************
* Acciones de composición de Adobe Edge Animate
*
* Editar este archivo con precaución, teniendo cuidado de conservar 
* las firmas de función y los comentarios que comienzan con "Edge" para mantener la 
* capacidad de interactuar con estas acciones en Adobe Edge Animate
*
***********************/
(function($, Edge, compId){
var Composition = Edge.Composition, Symbol = Edge.Symbol; // los alias más comunes para las clases de Edge

   //Edge symbol: 'stage'
   (function(symbolName) {
      
      
      Symbol.bindElementAction(compId, symbolName, "${e1e2a22a88c872874c7f8a2b8bd2cf2a2}", "click", function(sym, e) {
         sym.play(0);

      });
      //Edge binding end

      Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 4523, function(sym, e) {
         sym.play(0);

      });
      //Edge binding end

   })("stage");
   //Edge symbol end:'stage'

})(window.jQuery || AdobeEdge.$, AdobeEdge, "EDGE-328500636");