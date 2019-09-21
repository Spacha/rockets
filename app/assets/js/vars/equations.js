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

	"eq2_11": String.raw`
	\begin{aligned}
		\displaystyle\frac{I_t}{w_0} &= \displaystyle\frac{I_t}{(m_f+m_p)g_0} \\ &= \displaystyle\frac{I_s}{m_f/m_p + 1}
	\end{aligned}`,
	"eq2_12": String.raw`F = \displaystyle \frac{d(mv_2)}{dt} = \dot{m}v_2 \text{ at sea level} = \frac{\dot{w}}{g_0}v_2`,
	"eq2_13": String.raw`F = \dot{m}v_2 + (p_2-p_3)A_2`,
	"eq2_14": String.raw`F = \dot{m}v_2 + p_2A_2`,
	"eq2_15": String.raw`c = v_2 + (p_2 - p_3)A_2/\dot{m} = I_sg_0`,
	"eq2_16": String.raw`F = (\dot{w}/g_0)v_2 = \dot{m}c`,
	"eq2_17": String.raw`c^* = p_1A_t/\dot{m}`,
	"eq2_18": String.raw`P_{jet} = \frac{1}{2}\dot{m}v_2^2 = \frac{1}{2}\dot{w}g_0I_s^2 = \frac{1}{2}Fg_0I_s = \frac{1}{2}Fv_2`,
	"eq2_19": String.raw`P_{chem} = \dot{m}Q_RJ`,
	"eq2_20": String.raw`P_{vehicle} = Fu`,
	"eq2_21": String.raw`\eta_{int} = \displaystyle \frac{\text{kinetic power in jet}}{\text{available chemical power}} = \displaystyle \frac{\frac{1}{2}\dot{m}v^2}{\eta_{comb}P_{chem}}`,
	"eq2_22": String.raw`
	\begin{aligned}
		\displaystyle \eta_p &= \frac{\text{vehicle power}}{\text{vehicle power} + \text{residual kinetic jet energy}} \\
		&= \displaystyle \frac{Fu}{Fu + \frac{1}{2}\dot{m}(c - u)^2} = \frac{2u/c}{1 + (u/c)^2}
	\end{aligned}`,
	"eq2_23": String.raw`F_{oa} = \sum F = F_1 + F_2 + F_3 + ...`,
	"eq2_24": String.raw`\dot{m}_{oa} = \sum \dot{m} = \dot{m}_1 + \dot{m}_2 + \dot{m}_3 + ...`,
	"eq2_25": String.raw`(I_s)_{oa} = F_{oa}/(g_0\dot{m}_{oa})`,
})