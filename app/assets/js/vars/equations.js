export const getEquations = () => ({
	"eq2_1": String.raw`I_t = \displaystyle\int_{0}^{t} Fdt`,
	"eq2_2": String.raw`I_t = Ft`,

	"eq2_3_4": String.raw`
		I_s = I_{sp} = \displaystyle \frac{\int_{0}^{t} Fdt}{g_0\int_{0}^{t} \dot{m}dt} = \displaystyle \frac{I_t}{m_pg_0}
	`,

	"eq2_4": String.raw`I_s = I_t/(m_pg_0)`,
	"eq2_5": String.raw`I_s = F/(\dot{m}g_0) = F/\dot{w} = I_t/w`,
	"eq2_6": String.raw`c = I_sg_0 = F/\dot{m}`,
	"eq2_7": String.raw`MR = m_f/m_0`,

	// propellant mass fraction
	"eq2_8_9_10": String.raw`
	\begin{aligned}
		\zeta &= m_p/m_0 \\ \zeta &= (m_0-m_f)/m_0 = m_p/(m_p+m_f) \\ m_0 &= m_p + m_f
	\end{aligned}`,

	"eq2_11_12": String.raw`\begin{aligned}\displaystyle\frac{I_t}{w_0} &= \displaystyle\frac{I_t}{(m_f+m_p)g_0} \\ &= \displaystyle\frac{I_s}{m_f/m_p + 1} \end{aligned}`,
	"eq2_13": String.raw``,
	"eq2_14": String.raw``,
	"eq2_15": String.raw``,
	"eq2_16": String.raw``,
	"eq2_17": String.raw``,
	"eq2_18": String.raw``,
	"eq2_19": String.raw``,
	"eq2_20": String.raw``,
})