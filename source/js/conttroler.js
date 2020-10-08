const controller  = {
    calcX:0,
    calcY:0,
    bck:null,

    init(bck){
        this.bck = bck
        window.addEventListener('mousemove', (e)=>{
            this.calcX = Math.sqrt(e.clientX)
            this.calcY = Math.sqrt(e.clientY)
        })
        window.addEventListener('keydown', (e)=>{
            console.log(e)

            if(e.key === 9){
                burgerSpan.style.transform = "rotate(180deg)"
                ulElt.style.position = 'relative'
                ulElt.style.textIndent = '0px'
                ulElt.style.overflow = 'visible'
                ulElt.style.left = 0
                navElt.style.marginTop = '0'

                ulElt.classList.add('active')
                navElt.classList.add('active')
            }
        })
    },
    update(){
        this.bck.x = this.calcX
        this.bck.y = this.calcY
    }
}
export default controller