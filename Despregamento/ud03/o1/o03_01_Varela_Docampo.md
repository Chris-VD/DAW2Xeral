Intenta explicar o resultado facendo uso de IAs. **Entrega ditas conclusións**.

*Isto ocorre porque **Google (e case todas as grandes plataformas de Internet) usan balanceo de carga, CDN e infraestrutura distribuída**. A túa lista mostra claramente que **moitos dominios diferentes resolven ás mesmas IPs**, e isto non é un erro: é unha característica fundamental da arquitectura de Google.*

​	-ChatGPT, 2025

Empregar so unha IP por servizo dificultaría o escalado das aplicacións, custaría máis cartos, sobrecaragaríase... Por isto google emprega varias IPs para os mesmos dominios, as cales me imaxino que se distribúen baseándose en cercanía ó servidos da IP e outros factores. Por exemplo, pode que para acceder a google.com, se estou en madrid irei a unha IP e se tou en berlín a outra, baseandonos na cercanía ós servidores de google no lugar ou algo.